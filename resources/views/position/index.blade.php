@extends('adminlte::page')

@section('title', 'Manage Data Position')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Position List</div>
    <div class="card-body">
        @can('create-position')
            <a href="{{ route('position.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Position</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Title</th>
                <th scope="col">Department</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($positions as $position)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $position->title }}</td>
                    <td>{{ $position->department->dept_name }}</td>
                    <td>{{ $position->description }}</td>
                    <td>
                        <form action="{{ route('position.destroy', $position->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('position.show', $position->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-position')
                                <a href="{{ route('position.edit', $position->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-position')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Position?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="5">
                        <span class="text-danger">
                            <strong>No Position Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $positions->links() }}

    </div>
</div>
@endsection