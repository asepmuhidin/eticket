@extends('adminlte::page')
@section('title', 'Manage Data Type')
@section('content')
<div class="card">
    <div class="card-header bg-primary">Level List</div>
    <div class="card-body">
        @can('create-type')
            <a href="{{ route('types.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New level</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $type->type }}</td>
                    <td>{{ $type->description }}</td>
                    <td>
                        <form action="{{ route('types.destroy', $type->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('types.show', $type->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-type')
                                <a href="{{ route('types.edit', $type->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-type')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Type?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Type Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $types->links() }}

    </div>
</div>
@endsection