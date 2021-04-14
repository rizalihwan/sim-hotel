<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

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
        try {
            return PDF::setOptions($this->setPdfOption())->loadView('report.finance_pdf', [
                'now' => Carbon::now(),
                'bookings' => Booking::where('status', 1)->orderBy('booking_code', 'ASC')->get()
            ])->stream();
        } catch (Exception $e) {
            Alert::error('Message Information', 'Payment error ' . $e);
            return back();
        }
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
            try {
                return PDF::setOptions($this->setPdfOption())->loadView('report.booking_pdf', [
                    'bookings' => $bookings,
                    'startDate' => $startDate,
                    'endDate' => $endDate
                ])->stream();
            } catch (Exception $e) {
                Alert::error('Message Information', 'Something was wrong because ' . $e);
                return back();
            }
        } else {
            try {
                return PDF::setOptions($this->setPdfOption())->loadView('report.booking_pdf', [
                    'bookings' => Booking::orderBy('booking_code', 'ASC')->paginate(10)
                ])->stream();
            } catch (Exception $e) {
                Alert::error('Message Information', 'Something was wrong because ' . $e);
                return back();
            }
        }
    } 

    public function booking_excell()
    {
        return Excel::download(new ReportExport, 'bookings.xlsx');
    }
    
}
