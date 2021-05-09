<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
            'bookings' => Booking::where('status', 0)->orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay($id)
    {
        try{
            $booking = Booking::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return view('danger.exception', ['message' => 'system error due to payment not found']);
        }
        return view('admin.payment.pay', [
            'booking' => $booking
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
        try{
            Booking::findOrFail($id)->update([
                'status' => 1,
                'payment_date' => Carbon::now()
            ]);
        } catch (\Exception $e) {
            Alert::error('Message Information', 'Payment failed!');
            return back();
        }
        Alert::success('Message Information', 'Payment is Successfull');
        return redirect()->route('admin.payment.index');
    }
}
