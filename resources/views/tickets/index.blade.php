@extends('adminlte::page')

@section('title', 'Manage Data Tickets')

@section('content')
<div class="card">
  
    <div class="card-header bg-primary">
        <h3 class="card-title">Tickets List </h3>
        <div class="card-tools">
        @can('create-ticket')
            <a href="{{ route('tickets.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Open New Ticket</a>
        @endcan
        <a href="{{ route('tickets.export') }}" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Download</a>
        </div>
    </div>
    
    <div class="card-body">
        <div class="card-tools bg-white p-2 mb-3">
        <form action="" class="row align-items-center" method="GET">
            <div class="col">
                <input type="text" name="search" class="form-control" placeholder="Search Ticket">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-search"></i> Search</button>
                <a href="{{ route('tickets.index') }}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-counterclockwise"></i> Reset</a>
            </div>

        </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>    
                <th scope="col">@sortablelink('created_at','Date')</th>
                <th scope="col">@sortablelink('user.name','From')</th>
                <th scope="col">@sortablelink('subject','Subject')</th>
                <th scope="col" width="80px">@sortablelink('status.name','Status')</th>
                <th scope="col" width="80px">@sortablelink('type.type','Priority')</th>
                <th scope="col" width="200px">Progress</th>
                <th scope="col" width="80px">Approved</th>
                
                <th scope="col" width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                <?php 
                    $res=number_format($ticket->TicketProgress($ticket->id),0);
                 ?>
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                    {{Carbon\Carbon::parse($ticket->created_at)->translatedFormat('d-m-Y')}}    
                    </td>
                    <td>{{ $ticket->custname}}, {{$ticket->cluster->name}} Blok {{$ticket->block}} / {{$ticket->block_no}} {{$ticket->block_sub}}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>
                        <span class="badge bg-{{$ticket->status->color}}">
                            {{ $ticket->status->name }}
                        </span>
                    </td>
                    <td>{{ $ticket->type->type }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped" role="progressbar" 
                                style="width: {{$res}}%" 
                                aria-valuenow="{{$res}}"
                                aria-valuemin="0" 
                                aria-valuemax="100">
                                {{$res}}%
                            </div>
                            
                         </div>
                    </td>
                    <td>
                        
                     <!--    @if($ticket->level1_confirm)
                            <span class="badge bg-success"><i class="bi bi-check"></i> Sales</span>
                        @else
                            <span class="badge bg-danger"><i class="bi bi-x"></i> Sales</span>
                        @endif

                        @if($ticket->delegateTo)
                            <span class="badge bg-success"><i class="bi bi-check"></i>Delegate</span>
                        @else
                            <span class="badge bg-danger"><i class="bi bi-x"></i> Delegate</span>
                        @endif    
 -->
                        @if($ticket->level2_confirm)
                            <span class="badge bg-success"><i class="bi bi-check"></i> PM</span>
                        @else
                            <span class="badge bg-danger"><i class="bi bi-x"></i> PM</span>
                        @endif
                    </td>
                    
                   
                    
                    <!-- EDIT / DELETE  -->
                    <td>
                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                            @if(!$ticket->level2_confirm)
                            @can('edit-ticket')
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-ticket')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this ticket?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                            @endif
                        </form>
                        
                         <!-- SALES APPROVAL  -->
                        <!-- <form action="{{ route('tickets.approval', $ticket->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="level1_confirm" value='{{$ticket->level1_confirm}}' />

                            @if($position==$setting->sales_approve && $ticket->delegateTo==null)
                                @if($ticket->level1_confirm) 
                                    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Do you want to Unapproved this ticket?');"><i class="bi bi-trash"></i> Unapproved</button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Do you want to Approve this ticket?');"><i class="bi bi-check"></i> Approve</button>
                                @endif
                                
                            @endif
                            
                        </form>  -->   

                        <!-- PIC PROYEK DELEGATE  -->
                        <!-- <form action="{{ route('tickets.delegated', $ticket->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('PUT')
                            
                            <input type="hidden" name="delegateTo" value='null' />

                            @if($ticket->level1_confirm)
                                @can('delegate-ticket')
                                    @if(!$ticket->delegateTo)
                                        <a href="{{ route('tickets.delegate', $ticket->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Delegate</a>
                                    @elseif(!$ticket->level2_confirm)
                                        <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Do you want to Undelegated this ticket?');"><i class="bi bi-trash"></i> Undelegate</button> 
                                    @else
                                    @endif
                                @endcan
                            @endif
                        </form>    --> 
                        
                        <!-- MANAGER PROYEK APPROVED  -->
                        <form action="{{ route('tickets.pmapproval', $ticket->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('PUT')
                            
                        <input type="hidden" name="level2_confirm" value='{{$ticket->level2_confirm}}' />
                        @if($ticket->status_id!=2)
                        @can('pm-approval-ticket')
                            @if(!$ticket->level2_confirm)
                                <a href="{{ route('tickets.viewapproval', $ticket->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Approve</a> 
                            @else
                                <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('Do you want to Unapproved this ticket?');"><i class="bi bi-trash"></i> Unapproved</button>
                            @endif
                        @endcan 
                        @endif
                        </form>
                        <!-- PENGERJAAN TIKET BAGIAN PLAN -->
                            @can('create-ticket-progress')
                                @if($ticket->level2_confirm)
                                    <form action="{{ route('item_progress.indexByTicket', $ticket->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_ticket" value='{{$ticket->id}}' />    
                                       <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Progress</button>
                                   </form>
                                    <!-- close tiket button jika 100% -->
                                    @if($res==100 && $ticket->status_id!=3)
                                       <form action="{{ route('tickets.close', $ticket->id) }}" method="post" style="display:inline">
                                           @csrf
                                           @method('PUT')
                                           <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to close this ticket?');"><i class="bi bi-trash"></i> Close</button>
                                       </form>
                                    @endif   
                                @endif
                            @endcan
                         
                    </td>
                  
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Tickets Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $tickets->links() }}

    </div>
</div>
@endsection