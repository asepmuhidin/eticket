@extends('adminlte::page')
@section('title', 'Delegate Tickets')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    <h4>Delegate Ticket</h4>
                </div>
                <div class="float-end">
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tickets.delegate', $ticket->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Subject</label>
                        
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ $ticket->subject }}" disabled>
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-md-4">
                            <label  class="col-md-4 col-form-label text-md-end text-start">Status</label> 
                            <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id" disabled>
                                @foreach ($statuses as $status)
                                    @if($status->id==$ticket->status_id))    
                                        <option value="{{$status->id}}" selected>{{$status->name}}</option>
                                    @else
                                        <option value="{{$status->id}}" >{{$status->name}}</option>
                                    @endif
                                @endforeach
                            </select>     

                            @if ($errors->has('status_id'))
                                <span class="text-danger">{{ $errors->first('status_id') }}</span>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label  class="col-md-4 col-form-label text-md-end text-start">Priority</label> 
                            <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" disabled>
                                @foreach ($priorities as $priority)
                                    @if($priority->id==$ticket->type_id))
                                        <option value="{{$priority->id}}" selected>{{$priority->type}}</option>
                                    @else
                                        <option value="{{$priority->id}}">{{$priority->type}}</option>
                                    @endif
                                @endforeach
                            </select>     

                            @if ($errors->has('type_id'))
                                <span class="text-danger">{{ $errors->first('type_id') }}</span>
                            @endif
                        </div>

                        </div>
                    </div>    
                    
                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="message" class="col-md-10 col-form-label text-md-end text-start">Message</label>
                            <textarea class="ckeditor form-control" name="message" disabled>{{$ticket->message}}</textarea>                        
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                        <div class="col-md-6">
                            <label  class="col-md-4 col-form-label text-md-end text-start">Delegate to :</label> 
                            <select class="form-control @error('delegateTo') is-invalid @enderror" id="delegateTo" name="delegateTo">
                            @if($ticket->delegateTo)
                                @foreach ($delegates as $delegate)
                                    @if($delegate->id==$ticket->delegateTo))
                                        <option value="{{$delegate->id}}" selected>{{$delegate->name}}</option>
                                    @else
                                        <option value="{{$delegate->id}}">{{$delegate->name}}</option>
                                    @endif
                                @endforeach
                            @else
                                <option value="null" selected>--NONE--</option>
                                @foreach ($delegates as $delegate)
                                        <option value="{{$delegate->id}}">{{$delegate->name}}</option>
                                @endforeach
                            @endif    
                            </select>     

                            @if ($errors->has('type_id'))
                                <span class="text-danger">{{ $errors->first('type_id') }}</span>
                            @endif 
                        </div>
                        <div class="col-md-6">
                        <label  class="col-md-4 col-form-label text-md-end text-start">Due Date :</label> 
                            <div class="input-group date" >
                            @php
                                $config = ['format' => 'YYYY-MM-DD'];
                            @endphp    
                            <x-adminlte-input-date name="due_date" :config="$config" >
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-gradient-info">
                                        <i class="far fa-lg fa-calendar-alt "></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-date>    
                            </div>
                            @if ($errors->has('due_date'))
                                <span class="text-danger">{{ $errors->first('due_date') }}</span>
                            @endif
                        </div>    
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

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@stop