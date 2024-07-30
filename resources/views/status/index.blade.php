@extends('adminlte::page')
@section('title', 'Manage Data Status')
@section('content')
<div class="card">
    <div class="card-header bg-primary">Status List</div>
    <div class="card-body">
        @can('create-status')
            <a href="{{ route('status.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Status</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Color</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statuses as $Status)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $Status->name }}</td>
                    <td>{{ $Status->description }}</td>
                    
                    <td>
                        <span class="badge bg-{{strtolower($Status->color)}}">{{ $Status->color}}</span>
                    </td>
                    
                    <td>
                        <form action="{{ route('status.destroy', $Status->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('status.show', $Status->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-status')
                                <a href="{{ route('status.edit', $Status->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-status')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Status?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Status Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $statuses->links() }}

    </div>
</div>
@endsection