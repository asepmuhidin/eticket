@extends('adminlte::page')
@section('title', 'Show Data House')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Item House Information
                </div>
                <div class="float-end">
                    <a href="{{ route('houses.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>House Name :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $house->name }}
                        </div>

                    </div>
                    <div class="row">
                        <label for="cluster_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Cluster Name :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $house->cluster->name }}
                        </div>
                        </div>
                        
                    
            </div>
        </div>
    </div>    
</div>
    
@endsection