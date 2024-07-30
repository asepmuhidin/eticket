@extends('adminlte::page')
@section('title', 'Add Data Position')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Add New Position
                </div>
                <div class="float-end">
                    <a href="{{ route('position.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('position.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">title</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label  class="col-md-4 col-form-label text-md-end text-start">Department</label> 
                        <div class="col-md-6">    
                            <select class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                                @foreach ($departments as $department)
                                    @if($department->id==old('department_id'))
                                        <option value="{{$department->id}}" selected>{{$department->dept_name}}</option>
                                    @else
                                        <option value="{{$department->id}}">{{$department->dept_name}}</option>
                                    @endif
                                @endforeach
                            </select>     

                            @if ($errors->has('department_id'))
                                <span class="text-danger">{{ $errors->first('department_id') }}</span>
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
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add position">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection