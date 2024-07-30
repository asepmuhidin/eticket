@extends('adminlte::page')
@section('title', 'Edit Data House')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Edit House
                </div>
                <div class="float-end">
                    <a href="{{ route('houses.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('houses.update', $house->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">House Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $house->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- cluster -->
                    <div class="mb-3 row">
                        <label for="cluster_id" class="col-md-4 col-form-label text-md-end text-start">Cluster</label>
                        <div class="col-md-6">
                            <select name="cluster_id" id="cluster_id" class="form-control @error('cluster_id') is-invalid @enderror">
                                <option value="">Select Cluster</option>
                                @foreach ($clusters as $cluster)
                                    <option value="{{ $cluster->id }}" {{ $house->cluster_id == $cluster->id ? 'selected' : '' }}>{{ $cluster->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cluster_id'))
                                <span class="text-danger">{{ $errors->first('cluster_id') }}</span>
                            @endif
                        </div>
                    </div>


                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update House Type">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection