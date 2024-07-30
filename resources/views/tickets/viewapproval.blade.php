@extends('adminlte::page')
@section('title', 'Approval Ticket')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    <h4>Ticket Information</h4>
                </div>
                <div class="float-end">
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        From
                        <address>
                        <strong>{{$ticket->custname}}</strong><br>
                        @if($ticket->block)
                            Block {{$ticket->block}}
                        @else
                            -
                        @endif / 
                        @if($ticket->block_no)
                            {{$ticket->block_no}}
                        @else
                            -
                        @endif  
                        <br>
                        @if($ticket->cluster_id)
                            Cluster {{$ticket->cluster->name}}<br>
                        @endif
                        @if($ticket->house_id)
                            {{$ticket->house->name}}
                        @else
                            -    
                        @endif
                        
                        <br>
                       
                        Renovation Date :
                        @if($ticket->renov_date)
                         {{Carbon\Carbon::parse($ticket->renov_date)->format('d M Y')}}
                        @endif 
                        </address>
                    </div>

                    <div class="col-sm-4">
                        To
                        <address>
                        <strong>
                        @if($ticket->complain_id)    
                            {{$ticket->complain->type}}  
                            {{$ticket->complain->initial}}
                        @endif
                        </strong><br>
                        @if($ticket->complain_id)
                        {{$ticket->complain->user->name}}<br>
                            Email: {{ $ticket->complain->user->email }}<br>
                        @endif
                        </address>
                    </div>

                    <div class="col-sm-4">
                        <b>Ticket #TKPP{{$ticket->created_at->format('y')}}{{str_pad($ticket->id, 6, '0', STR_PAD_LEFT)}}</b><br>
                        <br>
                        <b>Complience Date :</b>
                            @if($ticket->complain_date) 
                                {{Carbon\Carbon::parse($ticket->complain_date)->format('d M Y')}}
                            @endif
                            <br>
                        <b>BAST Date :</b> 
                            @if($ticket->bast_date)
                                {{Carbon\Carbon::parse($ticket->bast_date)->format('d M Y')}}
                            @endif
                            <br>
                        <b>Due Date :</b> 
                            @if($ticket->due_date)    
                                {{Carbon\Carbon::parse($ticket->due_date)->format('d M Y')}}
                            @endif  
                            <br>
                    </div>

                </div>

                 <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Subject</h4>
                        <p>{{$ticket->subject}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Description</h4>
                        <p>{!!$ticket->message!!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Attachment</h4>
                        @if($files)
                                <ul style="list-style-type: none;padding:0;">
                                @foreach($files as $file)
                                    <li><li class="far fa-fw fa-file"></li><a href="{{ asset('storage/uploads/'.$file)}}">{{$file}}</a></li>
                                @endforeach
                                </ul>
                         @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <h4>Approval</h4>
                        <p>
                     <form action="{{ route('tickets.pmapproval', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="level2_confirm" value='{{$ticket->level2_confirm}}' />

                        <div class="col-md-4">
                            <label for="complain_date" class="col-md-12 col-form-label text-md-end text-start">Due Date</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input @error('due_date') is-invalid @enderror" 
                                    data-target="#datetimepicker1" id="complain_date" name="due_date" value="{{$ticket->due_date}}">
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            @if ($errors->has('due_date'))
                                <span class="text-danger">{{ $errors->first('due_date') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                        <div class="col-md-12">
                            <label for="comments" class="col-md-10 col-form-label text-md-end text-start">Comments</label>
                            <textarea class="ckeditor form-control" name="comments">{{$ticket->comments}}</textarea>                        
                            @if ($errors->has('comments'))
                                <span class="text-danger">{{ $errors->first('comments') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Approve">
                    </div>
                    </form>  
                    
                    </div>
                </div>            

            </div>    
        </div>
    </div>    
</div>
    
@endsection

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
    <link rel="stylesheet" href="/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="/vendor/moment/moment.min.js"></script>
    <script src="/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                        format: 'YYYY-MM-DD'
                });

            });
    </script>


@stop