@extends('adminlte::page')

@section('title', 'Manage Data Compliance Type')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Compliance Type List</div>
    <div class="card-body">
        @can('create-complain')
            <a href="{{ route('complains.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Compliance Type</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Type</th>
                <th scope="col">PIC</th>
                <th scope="col">Initial</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($complains as $complain)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $complain->type }}</td>
                    <td>{{ $complain->user->name }}</td>
                    <td>{{ $complain->initial }}</td>
                    <td>{{ $complain->description }}</td>
                    <td>
                        <form action="{{ route('complains.destroy', $complain->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('complains.show', $complain->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-complain')
                                <a href="{{ route('complains.edit', $complain->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-complain')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Compliance Type?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Compliance Type Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $complains->links() }}

    </div>
</div>
@endsection