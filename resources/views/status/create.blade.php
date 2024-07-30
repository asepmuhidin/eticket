@extends('adminlte::page')

@section('content')
@section('title', 'Manage Data Status')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Add New Status
                </div>
                <div class="float-end">
                    <a href="{{ route('status.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('status.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-md-4 col-form-label text-md-end text-start">Color</label>
                        <div class="col-md-6">
                            
                            <select class="form-control @error('color') is-invalid @enderror" id="color" name="color">
                                @foreach ($colors as $color)
                                    <option value="{{$color}}">{{$color}}</option>
                                @endforeach
                            </select>     

                            @if ($errors->has('color'))
                                <span class="text-danger">{{ $errors->first('error') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Status">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection