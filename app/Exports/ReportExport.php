<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ReportExport implements FromView,WithColumnWidths,WithColumnFormatting,WithMapping,WithStyles
{
    
    private $daterange;
    public function __construct($daterange)
    {
        //dd($daterange);
        $this->daterange = $daterange;
        
    }
    /**
    * @return \Illuminate\Support\View
    */
    public function view(): View
    {
        if($this->daterange){
            $data=Ticket::whereBetween('created_at', $this->daterange)->latest()->get();
        }else{
            $data=Ticket::latest()->get();
        }
        return view('exports.report_tickets', [
            'tickets' => $data
        ]);
    }

    public function map($ticket): array
    {
        return [
            Date::dateTimeToExcel($ticket->created_at),
            Date::dateTimeToExcel($ticket->complain_date),
            Date::dateTimeToExcel($ticket->bast_date),
            Date::dateTimeToExcel($ticket->due_date),
            Date::dateTimeToExcel($ticket->level2_confirm_date)

        ];
    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function columnWidths(): array
    {
        return [
            
            'A' =>	5,
            'B' =>	20,
            'C' =>	20,
            'D' =>	20,
            'E' =>	20,
            'F' =>	20,
            'G' =>	30,
            'H' =>	15,
            'I' =>	5,
            'J' =>	5,
            'K' =>	5,
            'L' =>	20,
            'M' =>	8,
            'N' =>	40,
            'O' =>	40,
            'P' =>	40,
            'Q' =>	10,
            'R' =>	10,
            'S' =>	5       
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            // Styling a specific cell by coordinate.
        ];
    }
}
