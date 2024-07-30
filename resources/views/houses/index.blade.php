@extends('adminlte::page')

@section('title', 'Manage Data House')

@section('content')
<div class="card">
    <div class="card-header bg-primary">House Type List</div>
    <div class="card-body">
        @can('create-house')
            <a href="{{ route('houses.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New House Type</a>
        @endcan
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Type Name</th>
                <th scope="col">Cluster</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($houses as $house)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $house->name }}</td>
                    <td>{{ $house->cluster->name }}</td>
                    <td>
                        <form action="{{ route('houses.destroy', $house->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('houses.show', $house->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-house')
                                <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-house')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this house?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No house Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $houses->links() }}

    </div>
</div>
@endsection