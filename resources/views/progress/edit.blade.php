@extends('adminlte::page')
@section('title', 'Edit Item Compliance Progress')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Edit Item Compliance Progress
                </div>
                <div class="float-end">
                    <a href="{{ route('item_progress.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('item_progress.update', $item_progress->id) }}" method="post" enctype="multipart/form-data">                    
                    @csrf
                    @method("PATCH")
                    
                    <div class="mb-3 row">
                            <label for="name" class="col-md-6 col-form-label text-md-end text-start">
                            Ticket #ID : TKPP{{$ticket->created_at->format('y')}}{{str_pad($ticket->id, 6, '0', STR_PAD_LEFT)}}
                            <input type="hidden" name="id" value="{{$item_progress->id}}">
                        </label>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Item Compliance
                        </label>
                        <div class="col-md-6">
                        <select class="form-control @error('item_ticket_id') is-invalid @enderror" id="item_ticket_id" name="item_ticket_id">
                                <option value="">Select Item</option>
                                @foreach ($items as $item)
                                    @if($item->id==$item_progress->item_ticket_id)   
                                        <option value="{{$item->id}}" selected>{{$item->item->itemDescription}}</option>
                                    @else
                                        <option value="{{$item->id}}" >{{$item->item->itemDescription}}</option>
                                    @endif  
                                @endforeach
                            </select>
                            @if ($errors->has('item_ticket_id'))
                                <span class="text-danger">{{ $errors->first('item_ticket_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Status
                        </label>
                        <div class="col-md-6">
                        <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    @if($status->id==$item_progress->status_id)
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
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Change status Date
                        </label>
                        <div class="col-md-6">
                        <div class="input-group date" id="changedate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input @error('change_date') is-invalid @enderror" data-target="#changedate" name="change_date" value="{{ $item_progress->change_date }}">
                                <div class="input-group-append" data-target="#changedate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                                       
                            @if ($errors->has('change_date'))
                                <span class="text-danger">{{ $errors->first('change_date') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- reason -->
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Reason Change Status
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason">
                                {{ $item_progress->reason }}
                            </textarea>
                            
                            @if ($errors->has('reason'))
                                <span class="text-danger">{{ $errors->first('reason') }}</span>
                            @endif
                        </div>
                    </div>
                     <!-- Attachment -->
                     <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                        Select Files :
                        </label>
                        <div class="col-md-6">
                            <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment[]" multiple >
                        
                            @if ($errors->has('attachment'))
                                <span class="text-danger">{{ $errors->first('attachment') }}</span>
                            @endif
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
    <link rel="stylesheet" href="/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@stop

@section('js')
    <script src="/vendor/moment/moment.min.js"></script>
    <script src="/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
            $(function () {
               
                $('#changedate').datetimepicker({
                        format: 'YYYY-MM-DD'
                });
            });

    </script>
    @stop