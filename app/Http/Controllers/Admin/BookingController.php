<?php

namespace App\Http\Controllers\Admin;

use App\{Booking, Customer, Room};
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    protected function booking_code()
    {
        $number = Booking::count();
        if ($number > 0) {
            $number = Booking::max('booking_code');
            $strnum = substr($number, 24, 25);
            $strnum = $strnum + 1;
            if (strlen($strnum) == 4) {
                return 'BKNG' . $strnum;
            } else if (strlen($strnum) == 3) {
                return 'BKNG' . "0" . $strnum;
            } else if (strlen($strnum) == 2) {
                return 'BKNG' . "00" . $strnum;
            } else if (strlen($strnum) == 1) {
                return 'BKNG' . "000" . $strnum;
            }
        } else {
            return 'BKNG' . "0001";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.booking.index', [
            'kode' => $this->booking_code(),
            'now' => Carbon::now(),
            'bookings' => Booking::whereIn('status', ['0', '1'])->latest()->paginate(5),
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

    public function already_paid()
    {
        return view('admin.booking.index', [
            'kode' => $this->booking_code(),
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(5),
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

    public function not_yet_paid()
    {
        return view('admin.booking.index', [
            'kode' => $this->booking_code(),
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 0)->orderBy('booking_code', 'ASC')->paginate(5),
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

    public function approve_booking()
    {
        return view('admin.booking.approve', [
            'bookings' => Booking::where('status', 3)->orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }

    public function approve(Booking $booking)
    {
        try {
            $booking->update([
                'status' => 1
            ]);
            if ($booking->thumbnail) {
                \Storage::delete($booking->thumbnail);
            }
            Room::where('id', $booking->room_id)->update([
                'status' => 0
            ]);
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
        try{
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
