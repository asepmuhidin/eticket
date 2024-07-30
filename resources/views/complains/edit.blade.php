@extends('adminlte::page')
@section('title', 'Edit Data Compliance')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Edit Compliance
                </div>
                <div class="float-end">
                    <a href="{{ route('complains.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('complains.update', $complain->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Type</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ $complain->type }}">
                            @if ($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label  class="col-md-4 col-form-label text-md-end text-start">PIC</label> 
                        <div class="col-md-6">    
                            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                                @foreach ($users as $user)
                                    @if($user->id==$complain->user_id)
                                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                                    @else
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            </select>     

                            @if ($errors->has('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            @endif
                        </div>
                    </div> 

                    <div class="mb-3 row">
                        <label for="initial" class="col-md-4 col-form-label text-md-end text-start">Initial</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('initial') is-invalid @enderror" id="initial" name="initial" value="{{ $complain->initial}}" />
                            @if ($errors->has('initial'))
                                <span class="text-danger">{{ $errors->first('initial') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $complain->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection