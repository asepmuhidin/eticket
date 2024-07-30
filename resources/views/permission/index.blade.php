@extends('adminlte::page')

@section('title', 'Manage Data Permissions')

@section('content')
<div class="card">
    <div class="card-header">Permissions List</div>
    <div class="card-body">
        @can('create-permission')
            <a href="{{ route('permission.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Permission</a>
        @endcan
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Guard Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $permission)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td>
                        <form action="{{ route('permission.destroy', $permission->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('permission.show', $permission->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-product')
                                <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-product')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Permission?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Permission Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $permissions->links() }}

    </div>
</div>
@endsection