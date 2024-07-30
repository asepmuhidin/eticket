@extends('adminlte::page')

@section('title', 'Manage Data Item Compliance')

@section('content')
<div class="card">
    <div class="card-header bg-primary">Item Compliance List</div>
    <div class="card-body">
        @can('create-itemcomplains')
            <a href="{{ route('items.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Item Compliance</a>
        @endcan
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Item Descriptions</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->itemDescription }}</td>
                    <td>
                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-itemcomplains')
                                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-itemcomplains')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this itemcomplains?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Item complains Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $items->links() }}

    </div>
</div>
@endsection