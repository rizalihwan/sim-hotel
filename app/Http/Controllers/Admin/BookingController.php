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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
