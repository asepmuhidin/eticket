<?php

namespace App\Http\Controllers;

use App\Models\Item_Progress;
use App\Models\Ticket;
use App\Models\Item_Ticket;
use App\Http\Requests\StoreItem_ProgressRequest;
use App\Http\Requests\UpdateItem_ProgressRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemProgressController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-ticket-progress|edit-ticket-progress|delete-ticket-progress', ['only' => ['index','show']]);
       $this->middleware('permission:create-ticket-progress', ['only' => ['create','store']]);
       $this->middleware('permission:edit-ticket-progress', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-ticket-progress', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('ticket')) {
            $ticket=$request->session()->get('ticket');
            $item_progress=Item_Progress::with('item_ticket')
            ->whereRelation('item_ticket','ticket_id','=', $ticket->id)
            ->orderBy('item_progress.item_ticket_id', 'asc')
            ->orderBy('item_progress.change_date','asc')
            ->paginate(8);

            return view('progress.index', [
                'ticket' => $ticket,
                'progress' => $item_progress
            ]);
        }else{
            return redirect()->route('tickets.index');
        }
        
    }
    
     public function indexByTicket(Request $request, Ticket $ticket)
    {
       // dd($request->all());
        if($ticket){
            $item_progress=Item_Progress::with('item_ticket')
            ->whereRelation('item_ticket','ticket_id','=', $ticket->id)
            ->orderBy('item_progress.item_ticket_id', 'asc')
            ->orderBy('item_progress.change_date','asc')
            ->paginate(8);
            //dd($item_progress); 
            $request->session()->put('ticket', $ticket);
            return view('progress.index', [
                'ticket' => $ticket,
                'progress' =>$item_progress
            ]);
        }else{
            return redirect()->route('tickets.index');
        };
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticket=session()->get('ticket');
        $items=Item_Ticket::where('ticket_id', $ticket->id)->get();
        //dd($items[0]->item->itemDescription);
        return view('progress.create', [
            'ticket' => $ticket,
            'items' => $items,
            'statuses' => \App\Models\Status::where('id','!=', 1)->get()
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItem_ProgressRequest $request)
    {
        $validate=$request->validated();
        //add upload files progress
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
        //---------------------------------------
      //  dd($validate);
        Item_Progress::create($validate);
        
        return redirect()->route('item_progress.index')
                ->withSuccess('Item Compliance progress is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item_Progress $item_Progress)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
        $item_progress=Item_Progress::find($request->segments()[1]);
        $ticket=session()->get('ticket');
        $items=Item_Ticket::where('ticket_id', $ticket->id)->get();

        return view('progress.edit', [
            'item_progress' => $item_progress,
            'statuses' => \App\Models\Status::where('id','!=', 1)->get(),
            'items' => $items,
            'ticket' => $ticket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItem_ProgressRequest $request, Item_Progress $item_Progress)
    {
       $item_Progress=Item_Progress::find($request->id);
       // dd($request->id);
       $validate=$request->validated();
       //update attachment
        
       if($request->file('attachment')){
        //hapus dulu file sebelumnya jika ada
        $this->deleteFilesUploaded($item_Progress);

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
            $validate['attachment']=$item_Progress->attachment;

        }
        //---------------------------------------
       // dd($validate);

        $item_Progress->update($validate);
        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    public function deleteFilesUploaded(Item_Progress $item_progress)
    {
        
        $folder="uploads/";
        if($item_progress->attachment){
            $files=explode(";",$item_progress->attachment);
            foreach($files as $file){
                $filename=$folder.$file;
                if(Storage::exists($filename)){
                    Storage::delete($filename);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request )
    {
        $item_Progress=Item_Progress::find($request->segment(2));
        //dd($request->segment(2));
        $item_Progress->delete();
        return redirect()->route('item_progress.index')
                ->withSuccess('Item complience progress is deleted successfully.');
    }
}
