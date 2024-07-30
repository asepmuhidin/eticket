@extends('adminlte::page')
@section('title', 'Show Data Block')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Item Block Information
                </div>
                <div class="float-end">
                    <a href="{{ route('blocks.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Block Name :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $block->cluster->name }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Alpha1 :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $block->alpha1 }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Alpha2 :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">

                            {{ $block->alpha2 }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Numerik1 :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $block->num1 }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Numerik2 :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $block->num2 }}
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>    
</div>
    
@endsection