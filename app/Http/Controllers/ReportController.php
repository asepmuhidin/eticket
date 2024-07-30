<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportExport;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index', [
            'tickets' => Ticket::latest()->paginate(10),
        ]);
    }

    public function search(Request $request)
    {
        $daterange=$request->daterange;
        
        if($daterange){
            $date=explode(' - ',$daterange);  
            $date1 = Carbon::createFromFormat('d/m/Y', $date[0])->format('Y-m-d');
            $date2 = Carbon::createFromFormat('d/m/Y', $date[1])->format('Y-m-d');
            $between=[$date1,$date2];
            $request->session()->put('daterange', $between);
            //dd($date1,$date2);
            return view('reports.index', [
                'tickets' => Ticket::whereBetween('created_at', $between)->latest()->paginate(10),
            ]);

        }else{
            return view('reports.index', [
                'tickets' => Ticket::latest()->paginate(10),
            ]);  
        }
    }

    public function export(Request $request)
    {
        if($request->session()->has('daterange')) {
            $daterange=$request->session()->get('daterange');   
        }
        $request->session()->forget('daterange');
        return Excel::download(new ReportExport($daterange??null), 'report_tickets.xlsx');
    }
   
}
