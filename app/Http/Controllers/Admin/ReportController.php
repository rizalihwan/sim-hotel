<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    protected function setPdfOption()
    {
        return [
            'dpi' => 150,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true, 
            'isRemoteEnabled' => true
        ];
    }

    public function finance()
    {
        return view('report.finance', [
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->paginate(10)
        ]);
    }

    public function finance_pdf()
    {
        return PDF::setOptions($this->setPdfOption())->loadView('report.finance_pdf', [
            'now' => Carbon::now(),
            'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->get()
        ])->stream();
    }   

    public function booking()
    {
        return view('report.booking', [
            'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(10)
        ]);
    }

    public function cari(Request $request)
    {
        $request->validate([
            'startDate'=> 'required',
            'endDate'=> 'required',
        ]);
        $from = $request->startDate;
        $to = $request->endDate;
        $startDate = $from;
        $endDate = $to;
        $bookings = Booking::whereBetween('created_at', [$startDate,$endDate])->orderBy('booking_code', 'ASC')->paginate(10);
        return view('report.booking', compact('bookings', 'startDate', 'endDate'));
    }

    public function booking_pdf()
    {
        $from = request('startDate');
        $to = request('endDate');
        if(request('startDate') && request('endDate'))
        {
            $startDate = $from;
            $endDate = $to;
            $bookings = Booking::whereBetween('created_at', [$startDate,$endDate])->orderBy('booking_code', 'ASC')->paginate(10);
            return PDF::setOptions($this->setPdfOption())->loadView('report.booking_pdf', [
                'bookings' => $bookings,
                'startDate' => $startDate,
                'endDate' => $endDate
            ])->stream();
        } else {
            return PDF::setOptions($this->setPdfOption())->loadView('report.booking_pdf', [
                'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(10)
            ])->stream();
        }
    } 

}
