<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment.index', [
            'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay($id)
    {
        return view('admin.payment.pay', [
            'booking' => Booking::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment_success($id)
    {
        Booking::findOrFail($id)->update([
            'status' => 1
        ]);
        Alert::success('Message Information', 'Payment is Successfull');
        return redirect()->route('admin.payment.index');
    }
}
