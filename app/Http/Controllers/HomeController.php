<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Complain;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $ticketsOfYear = Ticket::select(
            DB::raw("(count(*)) as countOfTickets"),
            DB::raw("(DATE_FORMAT(created_at, '%m')) as month_year")
            )
            ->where(DB::raw("DATE_FORMAT(created_at, '%Y')"), date('Y'))
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
            ->orderBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
            ->get();
         
         $arr_tickets=[];   
         foreach($ticketsOfYear as $key => $value){
             $arr_tickets[$value['month_year']-1] = $value['countOfTickets'];
         }
                  
         $label_of_months=['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'];
         $arr_tickets_assoc=[];
         
         foreach($label_of_months as $key => $value){
             if(isset($arr_tickets[$key])){
                $arr_tickets_assoc[$key]=$arr_tickets[$key];
             }else{
                $arr_tickets_assoc[$key]=0;
             }
         }
         
     // dd($arr_tickets_assoc);
        $all_tickets=Ticket::all()->count();
        $open_tickets=Ticket::where('status_id',1)->count();
        $close_tickets=Ticket::where('status_id',3)->count();
        $progress_tickets=Ticket::where('status_id',2)->count();
        $hold_tickets=Ticket::where('status_id',5)->count();
        $start_tickets=Ticket::where('status_id',6)->count();
         
        $chartdata=[
            'tickets'=>[
                'all_tikets'=>$all_tickets,
                'open_tikets'=>$open_tickets,
                'close_tikets'=>$close_tickets,
                'progress_tikets'=>$progress_tickets,
                'hold_tikets'=>$hold_tickets,
                'start_tikets'=>$start_tickets
            ],
            'label_of_months'=>$label_of_months,
            'data_kate1'=>$arr_tickets_assoc,
            
            'label_pie'=>['Open','Close','Progress','Hold','All'],
            'data_pie'=>[$open_tickets,$close_tickets,$progress_tickets,$hold_tickets,$all_tickets],
            'colour_pie'=>['#f56954','#00a65a','#f39c12','#515863', '#00c0ef']
        ];


        //data untuk pie chart complience
        $sql="SELECT type, count(t.id)as total FROM `complains` c left join tickets t on c.id=t.complain_id GROUP BY type;";
        $res=DB::select($sql);
        $label_pie=[];
        $data_pie=[];
        $bg_pie=[];
        foreach($res as $key => $value){
            $label_pie[$key]=$value->type;
            $data_pie[$key]=$value->total;
            $bg_pie[$key]=sprintf("#%06x",rand(0,16777215));
        }
        //dd($label_pie,$data_pie,$bg_pie);
        $chart_pie_complain=[
            'label_pie'=>$label_pie,
            'data_pie'=>$data_pie,
            'bg_pie'=>$bg_pie
        ];

        //data untuk group item complain
        $sql1="SELECT i.itemDescription, count(t.id)as total 
        FROM items i left join item_ticket t on i.id=t.item_id
        GROUP BY t.item_id,i.itemDescription;";
        $res1=DB::select($sql1);

        $label_item=[];
        $data_item=[];
        foreach($res1 as $item){
            $label_item[]=$item->itemDescription;
            $data_item[]= $item->total;
        }
        $chart_item_complain=[
            'label_item'=>$label_item,
            'data_item'=>$data_item
        ];

       
      // dd($chart_item_complain);
        return view('home',[
            'chartdata'=>$chartdata,
            'chart_pie_complain'=>$chart_pie_complain,
            'chart_item_complain'=>$chart_item_complain
        ]);
    }
}
