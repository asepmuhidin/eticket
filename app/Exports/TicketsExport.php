<?php
    namespace App\Exports;

    use App\Models\Ticket;
    use Illuminate\Contracts\View\View;
    use Maatwebsite\Excel\Concerns\FromView;

    class TicketsExport implements FromView 
    {
        public function view(): View
        {
            return view('exports.tickets', [
                'tickets' => Ticket::all()
            ]);
        }
    }

?>