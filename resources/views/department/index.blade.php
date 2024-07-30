@extends('adminlte::page')

@section('title', 'Manage Data Department')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Department List</div>
    <div class="card-body">
        @can('create-department')
            <a href="{{ route('department.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Department</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Department Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $department->dept_name }}</td>
                    <td>{{ $department->description }}</td>
                    <td>
                        <form action="{{ route('department.destroy', $department->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('department.show', $department->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-department')
                                <a href="{{ route('department.edit', $department->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-department')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Department?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Department Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $departments->links() }}

    </div>
</div>
@endsection