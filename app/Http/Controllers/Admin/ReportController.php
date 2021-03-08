<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function finance()
    {
        return view('report.finance', [
            'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }
}
