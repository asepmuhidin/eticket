@extends('adminlte::page')
@section('title', 'Add Data Item Compliance Progres')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    Add New Item Compliance Progress
                </div>
                <div class="float-end">
                    <a href="{{ route('item_progress.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('item_progress.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 row">
                        <label for="name" class="col-md-6 col-form-label text-md-end text-start">
                            Ticket #ID : TKPP{{$ticket->created_at->format('y')}}{{str_pad($ticket->id, 6, '0', STR_PAD_LEFT)}}
                            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
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
                                    @if($item->id==old('item_ticket_id'))    
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
                                    @if($status->id==old('status_id'))    
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
                                    
                                    <input type="text" class="form-control datetimepicker-input @error('change_date') is-invalid @enderror" data-target="#changedate" name="change_date" value="{{ old('change_date') }}">
                                    
                                    <div class="input-group-append" data-target="#changedate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            
                            
                            @if ($errors->has('change_date'))
                                <span class="text-danger">{{ $errors->first('change_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Note
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('note') is-invalid @enderror" id="note" name="note">
                                {{ old('note') }}
                            </textarea>
                            
                            @if ($errors->has('note'))
                                <span class="text-danger">{{ $errors->first('note') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- remarks -->
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3 col-form-label text-md-end text-start">
                            Remarks
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks">
                                {{ old('remarks') }}
                            </textarea>
                            
                            @if ($errors->has('remarks'))
                                <span class="text-danger">{{ $errors->first('remarks') }}</span>
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
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Progress">
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