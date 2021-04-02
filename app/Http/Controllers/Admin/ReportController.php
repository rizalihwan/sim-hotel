<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    public function finance()
    {
        return view('report.finance', [
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(5)
        ]);
    }

    public function finance_pdf()
    {
        return PDF::setOptions([
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true
        ])->loadView('report.finance_pdf', [
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(5)
        ])->stream();
    }   

}
