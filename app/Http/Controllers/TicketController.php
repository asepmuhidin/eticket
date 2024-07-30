<?php

namespace App\Http\Controllers;

use App\Exports\TicketsExport;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Tictype;
use App\Models\User; 
use App\Models\Level;
use App\Models\Setting;
use App\Models\Cluster;
use App\Models\House;
use App\Models\Block;
use App\Models\Complain;
use App\Models\Item;
use App\Models\Item_Ticket;
use App\Models\Item_Progress;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use App\Mail\TicketSendEmail;
use App\Mail\TicketFeedbackEmail;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TicketController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-ticket|edit-ticket|delete-ticket|ss-approval-ticket|delegate-ticket|pm-approval-ticket|progress-ticket', ['only' => ['index','show']]);
        $this->middleware('permission:create-ticket', ['only' => ['create','store']]);
        $this->middleware('permission:edit-ticket', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-ticket', ['only' => ['destroy']]);
        $this->middleware('permission:delegate-ticket', ['only' => ['delegate']]);
        $this->middleware('permission:pm-approval-ticket', ['only' => ['pmapproval']]);
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        
        $user=\Auth::user();
        $position=$user->level_id;
        $search=$request->get('search');
        
        if($search){
            $tickets=Ticket::TicketByRole($position,$user->id)->with('user')
                ->whereHas('user',function($q) use($search){
                    $q->where('name','like','%'.$search.'%');
                })
                ->orWhereHas('status',function($q) use($search){
                    $q->where('name','like','%'.$search.'%');
                })
                ->orWhereHas('type',function($q) use($search){
                    $q->where('type','like','%'.$search.'%');
                })
                ->orWhere('subject','like','%'.$search.'%')
                ->orderBy('id', 'desc')
                ->sortable()->paginate(5)->fragment('tickets');
           
        }else{
            $tickets=Ticket::TicketByRole($position,$user->id)->orderBy('id', 'desc')->sortable()->paginate(5)->fragment('tickets');
        }
        
        return view('tickets.index', [
            //'role'=>$role,
            //'tickets' => Ticket::TicketByRole($role,$user->id)->paginate(8)
            'position'=>$position,
            'tickets' => $tickets,
            'setting'=>Setting::get()->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status=Status::where('id',1)->get();
        $priority=Tictype::all();
        $complain=Complain::all();
        $house=House::all();
        $block=Block::all();
        $cluster=Cluster::all();
        $items=Item::all();
        return view('tickets.create',[
            'statuses'=>$status,
            'priorities'=>$priority,
            'complains'=>$complain,
            'houses'=>$house,
            'blocks'=>$block,
            'clusters'=>$cluster,
            'items'=>$items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request) :RedirectResponse
    {
       //dd($request->all());
        // dd($request->file('attachment'));
        $validate=$request->validated();
        $validate['user_id']=auth()->user()->id;
        
        if($request->file('attachment')){
            $files=[];
            foreach($request->file('attachment') as $file){
                //$file_name=time().rand(1,99).'.'.$file->extension(); 
                $file_name=time().rand(1,99).'-'.str_replace(' ','-',$file->getClientOriginalName());
                //$file->move(public_path('uploads'), $file_name); ini disimpan langsung ke public/uploads
                $file->storeAs('uploads',$file_name); //disimpan ke storage/ticket
                $files[]=$file_name;
            }
            //$validate['attachment']=$request->file('attachment')->store('ticket');
            $validate['attachment']=implode(";",$files);
        }
            
        $ticket=Ticket::create($validate);
       

        /**
         * insert data ke table ticket_item
        */

        if($request->item_id){
            foreach($request->item_id as $item){
                Item_Ticket::create([
                    'ticket_id'=>$ticket->id,
                    'item_id'=>$item,
                    'status_id'=>$ticket->status_id
                ]);
            }
        }

         //update complain count
         $ticket_n=$ticket->getTicket_n($ticket->block,$ticket->block_no,$ticket->block_sub); 
         $ticket->update(['complain_count'=>$ticket_n]);


         /** 
          * Kirim email ke PM 
        */
        if(Setting::get()->first()->auto_email_pm==1){
            $this->send($ticket,'Permohonan Persetujuan tiket','CS');
        }
        
    
        return redirect()->route('tickets.index')
                ->withSuccess('New Ticket is added successfully.');  
    }
    /**
     * Send email 
     */
    public function send(Ticket $ticket, String $title, String $from='CS')
    {
        //id level untuk approval di  setting 
        if($from=='PM'){
            //$level=$ticket->delegateTo;ganti dari PIC tipe complain
            $pic_complain=$ticket->complain->user_id;
            
            $user_SA= User::where('id',$pic_complain)->first();
        }else{
            $level=Level::find(Setting::get()->first()->pm_approve);
            $user_SA= $level->user()->first();
        }
        
        //cs pengirim tiket   
        $cs=\Auth::user()->name; 
        $cs_email=\Auth::user()->email;

        $mailData=[
            'title'=>$title,
            'subject'=>$ticket->subject,
            'message'=> $ticket->message,
            'dearName'=>$user_SA->name,
            'cs'=>$cs,
            'date'=>Carbon::parse($ticket->created_at)->translatedFormat('d-m-Y'),
            'no_ticket'=>'#TKPP'.$ticket->created_at->format('y').str_pad($ticket->id, 6, '0', STR_PAD_LEFT),
            'view'=>$from=='PM'?'emails.ticketdelegate':'emails.ticket',
        ];
        FacadesMail::to($user_SA->email)->send(new TicketSendEmail($mailData));
       // FacadesMail::to($cs_email)->send(new TicketFeedbackEmail($mailData));
    }
    /**
     * 
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        if ($ticket->attachment){
            $files=explode(";",$ticket->attachment);
        }
        return view('tickets.show', [
            'ticket' => $ticket,
            'files'=>$files??""
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $status=Status::where('id',1)->get();
        $priority=Tictype::all();
        $complain=Complain::all();
        $cluster=Cluster::all();
        $house=House::where('cluster_id',$ticket->cluster_id)->get();
        $block=Block::where('cluster_id',$ticket->cluster_id)->get()->first();
        $sub_no_block=Setting::where("id", 1)->get(["sub_no_block"])->first(); 
        $suffix=substr($block->alpha1,0,1);
        $alpha_start=substr($block->alpha1,1,1);
        $alpha_end=substr($block->alpha2,1,1);
        $blocks=[];
        foreach(range($alpha_start,$alpha_end) as $v){
            $blocks[]=$suffix.$v;   
        }
        
        $blocks_no=[];
        foreach(range($block->num1,$block->num2) as $v){
            $blocks_no[]=$v;
        }
        
        $sub_blocks=explode(";",$sub_no_block->sub_no_block);
        

        $items=Item::all();

       //get all items ticket 
       $item_ticket=[];
       
       foreach($ticket->items as $key=>$item){
            $item_ticket[$item->item_id]=Item_Progress::find($item->id)?1:0;
       }    
        
       //dd($item_ticket);

        if($ticket->level2_confirm){
            return redirect()->back()
                ->withSuccess('Ticket cannot be edited, because the PM has been approved!.');
        }else{
            return view('tickets.edit', [
                'ticket' => $ticket,
                'statuses'=>$status,
                'priorities'=>$priority,
                'complains'=>$complain,
                'houses'=>$house,
                'blocks'=>$blocks,
                'blocks_no'=>$blocks_no,
                'clusters'=>$cluster,
                'blocks_sub'=>$sub_blocks,
                'items'=>$items,
                'item_ticket'=>$item_ticket
            ]);  
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        
               
        $validate=$request->validated();
        
        if($request->file('attachment')){
            //hapus dulu file sebelumnya jika ada
            $this->deleteFilesUploaded($ticket);

            $files=[];
            foreach($request->file('attachment') as $file){
                
                //$file_name=time().rand(1,99).'.'.$file->extension(); 
                $file_name=time().rand(1,99).'-'.str_replace(' ','-',$file->getClientOriginalName());
                //$file->move(public_path('uploads'), $file_name); ini disimpan langsung ke public/uploads
                $file->storeAs('uploads',$file_name); //disimpan ke storage/ticket
                $files[]=$file_name;
            }
            //$validate['attachment']=$request->file('attachment')->store('ticket');
            $validate['attachment']=implode(";",$files);
        }else{
            $validate['attachment']=$ticket->attachment;

        }
        
      //  dd($validate);
        $ticket->update($validate);


        if($request->item_id){
            //get all items ticket 
            $item_ticket_not_progress=[];
            $item_ticket_on_progress=[];

            foreach($ticket->items as $key=>$item){
                if(Item_Progress::find($item->id)===null){
                    $item_ticket_not_progress[]=$item->item_id;
                }else{
                    $item_ticket_on_progress[]=$item->item_id;
                }
           }  
          // dd($item_ticket_not_progress,$item_ticket_on_progress,$request->item_id,$ticket->id);
           //hapus tiket yang belum diprogress dan tambahkan dan request baru
            $ticket_have_item=Item_ticket::where('ticket_id',$ticket->id) 
                        ->whereIn('item_id',$item_ticket_not_progress);     //->delete(); 
            //dd($ticket_have_item->get());
            $ticket_have_item->delete();
           // dd($ticket_have_item->get());
            
           foreach($request->item_id as $item){
                
                if(Item_ticket::where('ticket_id',$ticket->id)->where('item_id',$item)->count()==0){
                    
                    Item_ticket::create([
                        'ticket_id'=>$ticket->id,
                        'item_id'=>$item,
                        'status_id'=>$ticket->status_id
                    ]);
                } 
            }              
            
        }else{
            Item_ticket::where('ticket_id',$ticket->id)->delete();
        }

        return redirect()->back()
                ->withSuccess('Ticket is updated successfully.');
    }

    public function deleteFilesUploaded(Ticket $ticket)
    {
        $folder="uploads/";
        if($ticket->attachment){
            $files=explode(";",$ticket->attachment);
            foreach($files as $file){
                $filename=$folder.$file;
                if(Storage::exists($filename)){
                    Storage::delete($filename);
                }
            }
        }
    }

    public function deleteItemTicket(Ticket $ticket)
    {
        Item_Ticket::where('ticket_id',$ticket->id)->delete();
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        if($ticket->level1_confirm){
            return redirect()->back()
                ->withSuccess('Ticket cannot be deleted, because the sale has been approved!.');
        }else{
            $this->deleteFilesUploaded($ticket);
            $this->deleteItemTicket($ticket);
            $ticket->delete();
                return redirect()->route('tickets.index')
                    ->withSuccess('Ticket is deleted successfully.');
        }            
    }


    /**
     * Approval Tiket : SALES  
     */
    public function approval(FormRequest $request,Ticket $ticket)
    {
        $req=$request->all();

        $ticket->level1_confirm=$req['level1_confirm']?"0":"1";
        $ticket->level1_confirm_date=date('Y-m-d');
        $ticket->update();
        return redirect()->route('tickets.index')
                    ->withSuccess('Ticket is Approved successfully.');
        
    }

    public function delegate(Ticket $ticket)
    {
        $status=Status::where('id',1)->get();
        $priority=Tictype::all();
        $delegates=User::where('level_id',Setting::get()->first()->pl)->get();
        return view('tickets.delegate', [
            'ticket' => $ticket,
            'statuses'=>$status,
            'priorities'=>$priority,
            'delegates'=>$delegates
        ]);
    }

    public function delegated(FormRequest $request,Ticket $ticket)
    {
        $req=$request->all();
        
        if($req['delegateTo']!='null')
        {
            $ticket->delegateTo=$req['delegateTo'];
            $ticket->due_date=$req['due_date'];
            $ticket->update();
            return redirect()->route('tickets.index')
                        ->withSuccess('Ticket is Delegate successfully.'); 
        }else{
            $ticket->delegateTo=null;
            $ticket->update();
            return redirect()->route('tickets.index')
                        ->withSuccess('Ticket is Undelegated successfully.');
        }  
    }

    /**
     * Approval-2 Tiket : MANAGER  
     */
    public function viewapproval(Ticket $ticket)
    {
        
        if ($ticket->attachment){
            $files=explode(";",$ticket->attachment);
        }
        return view('tickets.viewapproval', [
            'ticket' => $ticket,
            'files'=>$files??""
        ]);
          
    }
    public function pmapproval(FormRequest $request,Ticket $ticket)
    {
        //cek progress ticket
        $item_ticket=Item_Ticket::where('ticket_id',$ticket->id)->pluck('id');
        
        $isProgress=Item_Progress::whereIn('item_ticket_id',$item_ticket)->count();
        //dd($isProgress);
        if($isProgress>0){
            return redirect()->back()
                ->withSuccess('Ticket cannot be approved, because it has progress!.');      
        }

        $req=$request->all();
        if($req['level2_confirm']==0){
            $ticket->level2_confirm=1;
            $ticket->level2_confirm_date=date('Y-m-d');
            $ticket->due_date=date('Y-m-d', strtotime($req['due_date']));
            $ticket->comments=$req['comments'];
        }else{
            $ticket->level2_confirm=0;
        }
               

        $ticket->update();

        if(Setting::get()->first()->auto_email_pm==1 && $req['level2_confirm']==0){
            $this->send($ticket,'Persetujuan tiket','PM');
        }
        
        return redirect()->route('tickets.index')
                    ->withSuccess('Ticket is Approved successfully.');
        
    }

    public function progress(Ticket $ticket)
    {
        $status=Status::where('id','>',1)->get();
        
        if ($ticket->attachment){
            $files=explode(";",$ticket->attachment);
        }

        return view('tickets.progress', [
                'ticket' => $ticket,
                'files'=>$files??"",
                'statuses'=>$status
        ]);  

            
    }

    public function changeProgress(FormRequest $request,Ticket $ticket)
    {
        $req=$request->all();

        $ticket->status_id=$req['status_id'];
        $ticket->update();
        return redirect()->route('tickets.index')
                    ->withSuccess('Change Ticket status successfully.');
    }

    public function export() 
    {
        return Excel::download(new TicketsExport, 'tickets.xlsx');
    }


    public function fetchHouseType(Request $request)
    {
        $data['houses'] = House::where("cluster_id", $request->cluster_id)
                                ->get(["name", "id"]);
        $data['blocks'] = Block::where("cluster_id", $request->cluster_id)
                                ->get(["alpha1","alpha2","num1","num2", "id"])->first();
        
        $data['sub_blocks'] = Setting::where("id", 1)
                                ->get(["sub_no_block"])->first();                        
        return response()->json($data);
    }

    public function ticketClose(Ticket $ticket)
    {
       // dd($ticket);
        $ticket->status_id=3;
        $ticket->update();
        return redirect()->route('tickets.index')
                    ->withSuccess('Ticket is Closed successfully.');
    }

    
}
?>