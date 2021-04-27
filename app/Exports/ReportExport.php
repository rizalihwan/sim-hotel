<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ReportExport implements FromCollection, WithHeadings, WithTitle, WithEvents, WithCustomStartCell, WithColumnWidths, WithDrawings
{
    public function collection()
    {
        $data = DB::table('bookings')
        ->join('customers', 'customers.id', '=', 'bookings.customer_id')
        ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
        ->select('booking_code', 'check_in', 'check_out', 'customers.first_name', 'rooms.name')
        ->orderBy('booking_code', 'ASC')
        ->get();
        return $data;
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo Website');
        $drawing->setDescription('This is website logo.');
        $drawing->setPath(public_path('assets/images/logo/logoweb.png'));
        $drawing->setHeight(200);
        $drawing->setCoordinates('F1');
        return $drawing;
    }

    public function headings(): array
    {
        return [
            'Booking Code',
            'Check In',
            'Check Out',
            'Customer',
            'Room',
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 35,
            'B' => 20,         
            'C' => 20,    
            'D' => 15,     
            'E' => 15,    
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A2:F2')->applyFromArray([
                    'font' => ['bold' => true]
                ]);
            }
        ];
    }

    public function title(): string
    {
        return "BookingReport";
    }
}
