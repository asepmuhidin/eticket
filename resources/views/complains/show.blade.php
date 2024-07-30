@extends('adminlte::page')
@section('title', 'Show Data Compliance Type')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Compliance Type Information
                </div>
                <div class="float-end">
                    <a href="{{ route('complains.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Type :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $complain->type }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>PIC :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $complain->user->name }}
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Initial :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $complain->initial }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $complain->description }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection