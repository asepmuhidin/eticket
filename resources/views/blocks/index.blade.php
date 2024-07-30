@extends('adminlte::page')

@section('title', 'Manage Data Block')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Block List</div>
    <div class="card-body">
        @can('create-block')
            <a href="{{ route('blocks.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Block</a>
        @endcan
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Cluster</th>
                <th scope="col">Alpha1</th>
                <th scope="col">Alpha2</th>
                <th scope="col">Numerik1</th>
                <th scope="col">Numerik2</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blocks as $block)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $block->cluster->name }}</td>
                    <td>{{ $block->alpha1 }}</td>
                    <td>{{ $block->alpha2 }}</td>
                    <td>{{ $block->num1 }}</td>
                    <td>{{ $block->num2 }}</td>
                    <td>
                        <form action="{{ route('blocks.destroy', $block->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('blocks.show', $block->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-block')
                                <a href="{{ route('blocks.edit', $block->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-block')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Block?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Block Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $blocks->links() }}

    </div>
</div>
@endsection