<?php

namespace App\Exports;

use App\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking::all();
    }
}
