<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function finance()
    {
        return view('report.finance', [
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }
}
