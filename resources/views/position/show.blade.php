@extends('adminlte::page')
@section('title', 'Show Data Position')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Position Information
                </div>
                <div class="float-end">
                    <a href="{{ route('position.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Title :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $position->title }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Department :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $position->department->dept_name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $position->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection