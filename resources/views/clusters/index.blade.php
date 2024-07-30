@extends('adminlte::page')

@section('title', 'Manage Data Cluster')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Cluster List</div>
    <div class="card-body">
        @can('create-cluster')
            <a href="{{ route('clusters.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Cluster</a>
        @endcan
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Cluster Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clusters as $cluster)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cluster->name }}</td>
                    <td>
                        <form action="{{ route('clusters.destroy', $cluster->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('clusters.show', $cluster->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-cluster')
                                <a href="{{ route('clusters.edit', $cluster->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-cluster')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this cluster?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Cluster Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $clusters->links() }}

    </div>
</div>
@endsection