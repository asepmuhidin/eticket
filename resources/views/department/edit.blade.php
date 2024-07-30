@extends('adminlte::page')
@section('title', 'Edit Data Department')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Edit Department
                </div>
                <div class="float-end">
                    <a href="{{ route('department.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('department.update', $department->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="dept_name" class="col-md-4 col-form-label text-md-end text-start">Departmen Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('dept_name') is-invalid @enderror" id="dept_name" name="dept_name" value="{{ $department->dept_name }}">
                            @if ($errors->has('dept_name'))
                                <span class="text-danger">{{ $errors->first('dept_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $department->description }}</textarea>
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