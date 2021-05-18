<?php

namespace App\Http\Controllers\Admin;

use App\{Booking, Customer, Room};
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    public $kode;
    public $now;
    private $rooms;
    private $check_room;
    private $customers;

    public function __construct()
    {
        $number = Booking::count();
        if($number > 0)
        {
            $number = Booking::max('booking_code');
            $strnum = substr($number, 24, 25);
            $strnum = $strnum + 1;
            if(strlen($strnum) == 4)
            {
                $kode = 'BKNG' . $strnum;
            }else if (strlen($strnum) == 3) {
                $kode = 'BKNG' . "0" . $strnum;
            } else if (strlen($strnum) == 2) {
                $kode = 'BKNG' . "00" . $strnum;
            } else if (strlen($strnum) == 1) {
                $kode = 'BKNG' . "000" . $strnum;
            }
        } else {
            $kode = 'BKNG' . "0001";
        }
        $this->kode = $kode;
        $this->now = Carbon::now();
        $this->rooms = Room::where('status', 1)->orderBy('room_code', 'ASC')->get();
        $this->check_room = Room::orderBy('room_code', 'ASC')->get();
        $this->customers = Customer::orderBy('first_name', 'ASC')->get();
    }
    
    public function get()
    {
        if(request()->is('admin/booking'))
        {
            $bookings = Booking::whereIn('status', ['0', '1'])->latest()->paginate(5);
        } else if(request()->is('admin/already_paid'))
        {
            $bookings = Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(5);
        } else if(request()->is('admin/not_yet_paid'))
        {
            $bookings = Booking::where('status', 0)->orderBy('booking_code', 'ASC')->paginate(5);
        } else {
            return "System Error!";
        }
        return [
            'kode' => $this->kode,
            'bookings' => $bookings,
            'now' => $this->now,
            'rooms' => $this->rooms,
            'check_room' => $this->check_room,
            'customers' => $this->customers
        ];
    }

    public function index()
    {
        return view('admin.booking.index', $this->get());
    }

    public function already_paid()
    {
        return view('admin.booking.index', $this->get());
    }

    public function not_yet_paid()
    {
        return view('admin.booking.index', $this->get());
    }

    public function approve_booking()
    {
        return view('admin.booking.approve', [
            'bookings' => Booking::where('status', 3)->orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }

    public function approve(Booking $booking)
    {
        $email = $booking->email;
        $data = array(
            'name' => $booking->customer->FullName
        );
        try {
            Mail::send('message.email', $data, function ($mail) use ($email) {
                $mail->to($email, 'no-reply')
                    ->subject("HRI Hotel");
                $mail->from('hrihost99@gmail.com', 'HRI Hotel E-Mail');
            });
            if (Mail::failures()) {
                Alert::error('Message Information', 'Failed to send email please check your connection!');
                return back();
            } else {
                $booking->update([
                    'status' => 1
                ]);
                if ($booking->thumbnail) {
                    \Storage::delete($booking->thumbnail);
                }
                Room::where('id', $booking->room_id)->update([
                    'status' => 0
                ]);
            }
        } catch (\Exception $e) {
            Alert::error('Message Information', 'Approved failed!');
            return back();
        }
        Alert::success('Message Information', 'Approved is Successfull');
        return redirect()->route('admin.booking.approve');
    }

    public function decline(Booking $booking)
    {
        try {
            if ($booking->thumbnail) {
                \Storage::delete($booking->thumbnail);
            }
            $booking->delete();
        } catch (\Exception $e) {
            Alert::error('Message Information', 'Decline failed!');
            return back();
        }
        Alert::success('Message Information', 'Decline is Successfull');
        return back();
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.detail', compact('booking'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $room = Room::findOrFail($request->room_id);
        $room->update([
            'status' => 0
        ]);
        $attr = $request->all();
        $attr['status'] = 0;
        $time = date("H:i:s");
        $attr['check_in'] .= $time;
        $attr['check_out'] .= $time;
        Booking::create($attr);
        Alert::success('Information Message', 'Data Saved');
        return redirect()->route('admin.booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.booking.edit', [
            'booking' => Booking::findOrFail($id),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $attr = $this->validate(request(), [
            'booking_code' => 'required|min:3|unique:bookings,booking_code,' . $id,
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'room_id' => ['required'],
            'customer_id' => ['required'],
            'payment_type' => ['required', 'max:10']
        ]);
        $booking = Booking::findOrFail($id);
        try {
            $booking->update($attr);
        } catch (\Exception $e) {
            Alert::error('Message Information', 'Updated failed!');
            return back();
        }
        Alert::success('Message Information', 'Data Updated');
        return redirect()->route('admin.booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        Room::where('id', $booking->room_id)->update([
            'status' => 1
        ]);
        $booking->delete();
        Alert::success('Message Information', 'Data Deleted');
        return back();
    }

    public function refresh_booking()
    {
        $booking = Booking::where('status', 1)->pluck('room_id');
        Room::whereIn('id', $booking)->update([
            'status' => 1
        ]);
        Alert::success('Message Information', 'Refresh Success');
        return back();
    }
}
