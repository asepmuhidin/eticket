@extends('adminlte::page')
@section('title', 'Edit Data Compliance Item')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Edit Compliance Item
                </div>
                <div class="float-end">
                    <a href="{{ route('items.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('items.update', $item->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="itemDescription" class="col-md-4 col-form-label text-md-end text-start">Item Description</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('itemDescription') is-invalid @enderror" id="name" name="itemDescription" value="{{ $item->itemDescription }}">
                            @if ($errors->has('itemDescription'))
                                <span class="text-danger">{{ $errors->first('itemDescription') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Permission">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection