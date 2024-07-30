@extends('adminlte::page')
@section('title', 'Add Data Block')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Add New Block
                </div>
                <div class="float-end">
                    <a href="{{ route('blocks.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('blocks.store') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="cluster_id" class="col-md-4 col-form-label text-md-end text-start">Cluster</label>
                        <div class="col-md-6">
                          <select class="form-control @error('cluster_id') is-invalid @enderror" id="cluster_id" name="cluster_id">
                            @foreach ($clusters as $cluster)
                                <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                            @endforeach
                          </select>
                            @if ($errors->has('cluster_id'))
                                <span class="text-danger">{{ $errors->first('cluster_id') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="alpha1" class="col-md-4 col-form-label text-md-end text-start">Alpha Start</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('alpha1') is-invalid @enderror" id="alpha1" name="alpha1" value="{{ old('alpha1') }}">
                            @if ($errors->has('alpha1'))
                                <span class="text-danger">{{ $errors->first('alpha1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="alpha2" class="col-md-4 col-form-label text-md-end text-start">Alpha End</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('alpha2') is-invalid @enderror" id="alpha2" name="alpha2" value="{{ old('alpha2') }}">
                            @if ($errors->has('alpha2'))
                                <span class="text-danger">{{ $errors->first('alpha2') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="num1" class="col-md-4 col-form-label text-md-end text-start">Numerik Start</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('num1') is-invalid @enderror" id="num1" name="num1" value="{{ old('num1') }}">
                            @if ($errors->has('num1'))
                                <span class="text-danger">{{ $errors->first('num1') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="num2" class="col-md-4 col-form-label text-md-end text-start">Numerik End</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('num2') is-invalid @enderror" id="num2" name="num2" value="{{ old('num2') }}">
                            @if ($errors->has('num2'))
                                <span class="text-danger">{{ $errors->first('num2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Block">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection