@extends('adminlte::page')
@section('title', 'Ticket Information')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    <h4>Ticket Information</h4>
                </div>
                <div class="float-end">
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        From
                        <address>
                        <strong>{{$ticket->custname}}</strong><br>
                        @if($ticket->block)
                            Block {{$ticket->block}}
                        @else
                            -
                        @endif / 
                        @if($ticket->block_no)
                            {{$ticket->block_no}}
                        @else
                            -
                        @endif  
                        <br>
                        @if($ticket->cluster_id)
                            Cluster {{$ticket->cluster->name}}<br>
                        @endif
                        
                        @if($ticket->house_id)
                            {{$ticket->house->name}}
                        @else
                            -    
                        @endif
                        
                        <br>
                       
                        Renovation Date :
                        @if($ticket->renov_date)
                         {{Carbon\Carbon::parse($ticket->renov_date)->format('d M Y')}}
                        @endif 

                        <br>
                        Waranty Date :
                        @if($ticket->war_date)
                         {{Carbon\Carbon::parse($ticket->war_date)->format('d M Y')}}
                        @endif
                        </address>
                    </div>

                    <div class="col-sm-4">
                        To
                        <address>
                        <strong>
                        @if($ticket->complain_id)    
                            {{$ticket->complain->type}}  
                            {{$ticket->complain->initial}}
                        @endif
                        </strong><br>
                        @if($ticket->complain_id)
                        {{$ticket->complain->user->name}}<br>
                            Email: {{ $ticket->complain->user->email }}<br>
                        @endif
                        
                        </address>
                    </div>

                    <div class="col-sm-4">
                        <b>Ticket #TKPP{{$ticket->created_at->format('y')}}{{str_pad($ticket->id, 6, '0', STR_PAD_LEFT)}}</b><br>
                        <br>
                        <b>Complience Date :</b>
                            @if($ticket->complain_date) 
                                {{Carbon\Carbon::parse($ticket->complain_date)->format('d M Y')}}
                            @endif
                            <br>
                        <b>BAST Date :</b> 
                            @if($ticket->bast_date)
                                {{Carbon\Carbon::parse($ticket->bast_date)->format('d M Y')}}
                            @endif
                            <br>
                        <b>Due Date :</b> 
                            @if($ticket->due_date)    
                                {{Carbon\Carbon::parse($ticket->due_date)->format('d M Y')}}
                            @endif  
                            <br>
                            <?php 
                                $res=number_format($ticket->TicketProgress($ticket->id),2); 
                            ?>
                            <b>Progress : {{$res}}% </b><br>
                            <b>Complience to : {{$ticket->complain_count}}</b>
                            
                    </div>

                </div>

                 <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Subject</h4>
                        <p>{{$ticket->subject}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Description</h4>
                        <p>{!!$ticket->message!!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Complience Items / Item Keluhan</h4>
                        <table class="table table-bordered small">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Item</th>
                                    <th width="15%">Status</th>
                                    <th width="20%">Date</th>
                                    <th>Notes </th>
                                    <th>Remarks</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($ticket->items)
                                    @foreach($ticket->items as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->item->itemDescription}}</td>
                                            <td>{{$item->status->name}}</td>
                                            <td>{{Carbon\Carbon::parse($item->change_date)->format('d M Y')}}</td>
                                            <td>-</td>
                                        </tr>
                                        <?php
                                            $progress=\App\Models\Item_Progress::with('item_ticket')
                                            ->whereRelation('item_ticket','ticket_id','=', $ticket->id)
                                            ->where('item_ticket_id',$item->id)
                                            ->orderBy('item_ticket_id','ASC')
                                            ->orderBy('change_date','ASC')        
                                            ->get();
                                            //dd($progress);
                                        ?>
                                        @if($progress)
                                            @foreach($progress as $pro)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$pro->status->name}}</td>
                                                    <td>{{Carbon\Carbon::parse($pro->change_date)->format('d M Y')}}</td>
                                                    <td>{{$pro->note}}</td>
                                                    <td>{{$pro->remarks}}</td>
                                                    <td>{{$pro->reason}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Attachment</h4>
                        @if($files)
                                <ul style="list-style-type: none;padding:0;">
                                @foreach($files as $file)
                                    <li><li class="far fa-fw fa-file"></li><a href="{{ asset('storage/uploads/'.$file)}}">{{$file}}</a></li>
                                @endforeach
                                </ul>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Comment</h4>
                        @if($ticket->comments)
                            {!!$ticket->comments!!} 
                        @endif 
                    </div>
                </div>            

            </div>    
        </div>
    </div>    
</div>
    
@endsection