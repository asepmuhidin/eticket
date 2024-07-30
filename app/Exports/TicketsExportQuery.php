<?php
namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class TicketsExportQuery implements FromQuery
{
    use Exportable;
    private $year_;
    
    public function forYear($year)
    {
        $this->year_ = $year;
        return $this;   
    }

    public function query()
    {
        return Ticket::query()->whereYear('created_at', $this->year_);
    }

    
}
?>