@extends('adminlte::page')
@section('title', 'Setting')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            
            <div class="card-header bg-primary">
                <div class="float-start">
                    Application Setting 
                </div>
                <div class="float-end">
                    <a href="{{ route('setting.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('setting.update', $setting->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Sales Approval :</label>
                        <div class="col-md-6">
                        <select class="form-control @error('sales_approve') is-invalid @enderror"  id="sales_approve" name="sales_approve">
                            @foreach ($levels as $level)
                                @if($level->id==$setting->sales_approve))    
                                    <option value="{{$level->id}}" selected>{{$level->name .'/'.$level->description }}</option>
                                @else
                                    <option value="{{$level->id}}" >{{$level->name .'/'.$level->description}}</option>
                                @endif
                            @endforeach
                       </select>
                            @if ($errors->has('sales_approve'))
                                <span class="text-danger">{{ $errors->first('sales_approve') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Person Delegate  :</label>
                        <div class="col-md-6">
                        <select class="form-control @error('person_delegate') is-invalid @enderror"  name="person_delegate">
                            @foreach ($levels as $level)
                                @if($level->id==$setting->person_delegate))    
                                    <option value="{{$level->id}}" selected>{{$level->name .'/'.$level->description }}</option>
                                @else
                                    <option value="{{$level->id}}" >{{$level->name .'/'.$level->description}}</option>
                                @endif
                            @endforeach
                       </select>
                            @if ($errors->has('person_delegate'))
                                <span class="text-danger">{{ $errors->first('person_delegate') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">PM Approval  :</label>
                        <div class="col-md-6">
                        <select class="form-control @error('pm_approve') is-invalid @enderror"  name="pm_approve">
                            @foreach ($levels as $level)
                                @if($level->id==$setting->pm_approve))    
                                    <option value="{{$level->id}}" selected>{{$level->name .'/'.$level->description }}</option>
                                @else
                                    <option value="{{$level->id}}" >{{$level->name .'/'.$level->description}}</option>
                                @endif
                            @endforeach
                       </select>
                            @if ($errors->has('pm_approve'))
                                <span class="text-danger">{{ $errors->first('pm_approve') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Customer Service  :</label>
                        <div class="col-md-6">
                        <select class="form-control @error('cs') is-invalid @enderror"  name="cs">
                            @foreach ($levels as $level)
                                @if($level->id==$setting->cs))    
                                    <option value="{{$level->id}}" selected>{{$level->name .'/'.$level->description }}</option>
                                @else
                                    <option value="{{$level->id}}" >{{$level->name .'/'.$level->description}}</option>
                                @endif
                            @endforeach
                       </select>
                            @if ($errors->has('cs'))
                                <span class="text-danger">{{ $errors->first('cs') }}</span>
                            @endif
                        </div>
                    </div>    

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Planning  :</label>
                        <div class="col-md-6">
                        <select class="form-control @error('pl') is-invalid @enderror"  name="pl">
                            @foreach ($levels as $level)
                                @if($level->id==$setting->pl))    
                                    <option value="{{$level->id}}" selected>{{$level->name .'/'.$level->description }}</option>
                                @else
                                    <option value="{{$level->id}}" >{{$level->name .'/'.$level->description}}</option>
                                @endif
                            @endforeach
                       </select>
                            @if ($errors->has('pl'))
                                <span class="text-danger">{{ $errors->first('pl') }}</span>
                            @endif
                        </div>
                    </div> 

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Sub No Block  :</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('sub_no_block') is-invalid @enderror" name="sub_no_block" value="{{ $setting->sub_no_block }}">
                            @if ($errors->has('sub_no_block'))
                                <span class="text-danger">{{ $errors->first('pl') }}</span>
                            @endif
                        </div>
                    </div> 


                    <div class="mb-3 row">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                <h4>Auto Email Setting</h4>
                            </div>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="auto_email_ss" role="switch" {{ $setting->auto_email_ss ? 'checked':'' }}>
                                <label class="form-check-label">CS New Create Ticket </label>
                            </div>
                            </li>
                            <li class="list-group-item">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="auto_email_pm" role="switch" {{ $setting->auto_email_pm ? 'checked':'' }} >
                                <label class="form-check-label" >PM Approval</label>
                            </div>
                            </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Setting">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
    
</div>
    
@endsection