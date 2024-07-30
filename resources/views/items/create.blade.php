@extends('adminlte::page')
@section('title', 'Add Data Item Compliance')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Add New Item Compliance
                </div>
                <div class="float-end">
                    <a href="{{ route('items.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('items.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="itemDescription" class="col-md-4 col-form-label text-md-end text-start">Item Compliance</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('itemDescription') is-invalid @enderror" id="name" name="itemDescription" value="{{ old('itemDescription') }}">
                            @if ($errors->has('itemDescription'))
                                <span class="text-danger">{{ $errors->first('itemDescription') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Item Compliance">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection