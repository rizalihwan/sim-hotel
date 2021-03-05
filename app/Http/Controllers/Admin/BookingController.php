<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Customer;
use App\Room;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('admin.booking.index', [
            'kode' => $kode,
            'now' => Carbon::now(),
            'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(5),
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
            'check_room' => Room::orderBy('room_code', 'ASC')->get(),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
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
            'booking_code' => 'required|min:3|unique:bookings,booking_code,'.$id,
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'room_id' => ['required'],
            'customer_id' => ['required'],
            'payment_type' => ['required', 'max:10']
        ]);
        $booking = Booking::findOrFail($id);
        $booking->update($attr);
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
}
