<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>    
            <th scope="col">Date</th>
            <th scope="col">From</th>
            <th scope="col">Subject</th>
            <th scope="col">Status</th>
            <th scope="col">Priority</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tickets as $ticket)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>
                {{Carbon\Carbon::parse($ticket->created_at)->translatedFormat('d-m-Y')}}    
            </td>
            <td>{{ $ticket->user->name }}</td>
            <td>{{ $ticket->subject }}</td>
            <td>{{ $ticket->status->name }}</td>
            <td>{{ $ticket->type->type }}</td>
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