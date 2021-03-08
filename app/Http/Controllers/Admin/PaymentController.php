<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;

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
            'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(5),
            'rooms' => Room::where('status', 1)->orderBy('room_code', 'ASC')->get(),
            'customers' => Customer::orderBy('first_name', 'ASC')->get()
        ]);
    }

}
