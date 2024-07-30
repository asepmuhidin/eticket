@extends('adminlte::page')

@section('title', 'Manage Data Item Compliance Progress')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Item Compliance Progres List</div>
    <div class="card">
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
                    </div>

                </div>


            </div>    
        </div>
    <div class="card-body">
       
        @can('create-ticket-progress')
            <a href="{{ route('item_progress.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add Item Ticket Progress</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Item Compliance</th>
                <th scope="col">Status</th>
                <th scope="col">Status Date Change</th>
                <th scope="col">Note</th>
                <th scope="col">Remarks</th>
                <th scope="col">Reason</th>
                <th scope="col">Attachments</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($progress as $progres)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $progres->item_ticket->item->itemDescription }}</td>
                    <td>{{ $progres->status->name }}</td>
                    <td>{{ $progres->change_date }}</td>
                    <td>{{ $progres->note }}</td>
                    <td>{{ $progres->remarks }}</td>
                    <td>{{ $progres->reason }}</td>
                    <td>
                        @if($progres->attachment)
                                <ul style="list-style-type: none;padding:0;">
                                @foreach(explode(";",$progres->attachment) as $file)
                                    <li><li class="far fa-fw fa-file"></li><a href="{{ asset('storage/uploads/'.$file)}}">{{$file}}</a></li>
                                @endforeach
                                </ul>
                         @endif

                    </td>
                    <td>
                        <form action="{{ route('item_progress.destroy', $progres->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            @can('edit-ticket-progress')
                                <a href="{{ route('item_progress.edit', $progres->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-ticket-progress')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Item Compliance progress?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Item Compliance Progress Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $progress->links() }}

    </div>
</div>
@endsection