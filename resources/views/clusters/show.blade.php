@extends('adminlte::page')
@section('title', 'Show Data Cluster')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Item Cluster Information
                </div>
                <div class="float-end">
                    <a href="{{ route('clusters.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Cluster Name :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cluster->name }}
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>    
</div>
    
@endsection