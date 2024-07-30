<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>    
            <th scope="col">Ticket Date</th>
            <th scope="col">Complience Date</th>
            <th scope="col">Approval Date</th>
            <th scope="col">BAST Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">From</th>
            <th scope="col">Cluster</th>
            <th scope="col">Block</th>
            <th scope="col">No</th>
            <th scope="col">Sub</th>
            <th scope="col">House Type </th>
            <th scope="col">C.Type</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Comments</th>
            <th scope="col">Status</th>
            <th scope="col">Priority</th>
            <th scope="col">CTO</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tickets as $ticket)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                {{Carbon\Carbon::parse($ticket->created_at)->translatedFormat('d-m-Y')}}    
            </td>
            <td>
                {{Carbon\Carbon::parse($ticket->complain_date)->translatedFormat('d-m-Y')}}    
            </td>
            <td>
                {{Carbon\Carbon::parse($ticket->level2_confirm_date)->translatedFormat('d-m-Y')}}    
            </td>
            <td>
                {{Carbon\Carbon::parse($ticket->bast_date)->translatedFormat('d-m-Y')}}    
            </td>
            <td>
                {{Carbon\Carbon::parse($ticket->due_date)->translatedFormat('d-m-Y')}}    
            </td>
            <td>{{ $ticket->custname }}</td>
            <td>{{ $ticket->cluster->name }}</td>
            <td>{{ $ticket->block }}</td>
            <td>{{ $ticket->block_no }}</td>
            <td>{{ $ticket->block_sub }}</td>
            <td>{{ $ticket->house->name }}</td>
            <td>{{ $ticket->complain->type }}</td>
            <td>{{ $ticket->subject }}</td>
            <td>{!! $ticket->message !!}</td>
            <td>{!! $ticket->comments !!}</td>
            <td>{{ $ticket->status->name }}</td>
            <td>{{ $ticket->type->type }}</td>
            <td>{{ $ticket->complain_count }}</td>
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