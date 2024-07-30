@extends('adminlte::page')
@section('title', 'Open New Ticket')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">

        <div class="card">
            <div class="card-header bg-primary">
                <div class="float-start">
                    <h4>Open New Ticket</h4>
                </div>
                <div class="float-end">
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="custname" class="col-md-4 col-form-label text-md-end text-start">Customer Name</label>
                        
                            <input type="text" class="form-control @error('custname') is-invalid @enderror" id="custname" name="custname" value="{{ old('custname') }}">
                            @if ($errors->has('custname'))
                                <span class="text-danger">{{ $errors->first('custname') }}</span>
                            @endif
                        </div>
                        
                        <div class="col-md-3">
                            <label for="complain_date" class="col-md-12 col-form-label text-md-end text-start">Complience Type</label>
                            <select class="form-control @error('complain_id') is-invalid @enderror" id="complain_id" name="complain_id">
                                @foreach ($complains as $complain)
                                    @if($complain->id==old('complain_id'))    
                                        <option value="{{$complain->id}}" selected>{{$complain->type}}({{$complain->initial}})</option>
                                    @else
                                        <option value="{{$complain->id}}" >{{$complain->type}}({{$complain->initial}})</option>
                                    @endif
                                @endforeach
                            </select>     
                            
                            
                            @if ($errors->has('complain_id'))
                                <span class="text-danger">{{ $errors->first('complain_id') }}</span>
                            @endif
                        </div>
                        <!-- Complience Date -->
                        <div class="col-md-3">
                            <label for="complain_date" class="col-md-12 col-form-label text-md-end text-start">Complience Date</label>
                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                    
                                    <input type="text" class="form-control datetimepicker-input @error('complain_date') is-invalid @enderror" 
                                    data-target="#datetimepicker1" id="complain_date" name="complain_date" value="{{ old('complain_date') }}">
                                    
                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            
                            
                            @if ($errors->has('complain_date'))
                                <span class="text-danger">{{ $errors->first('complain_date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- cluster -->
                        <div class="col-md-3">
                            <label for="cluster_id" class="col-md-12 col-form-label text-md-end text-start">Cluster</label>
                            <select class="form-control @error('cluster_id') is-invalid @enderror" id="cluster-dropdown" name="cluster_id">
                            <option value="">Select Cluster</option>
                                @foreach ($clusters as $cluster)
                                    @if($cluster->id==old('cluster_id'))    
                                        <option value="{{$cluster->id}}" selected>{{$cluster->name}}</option>
                                    @else
                                        <option value="{{$cluster->id}}" >{{$cluster->name}}</option>
                                    @endif
                                @endforeach
                            </select>     
                            
                            
                            @if ($errors->has('cluster_id'))
                                <span class="text-danger">{{ $errors->first('cluster_id') }}</span>
                            @endif
                        </div>
                        
                        <!-- House -->
                        <div class="col-md-3">
                            <label for="house_id" class="col-md-12 col-form-label text-md-end text-start">House Type</label>
                            <select class="form-control @error('house_id') is-invalid @enderror" id="house-dropdown" name="house_id">
                               
                            </select>     
                            
                            
                            @if ($errors->has('house_id'))
                                <span class="text-danger">{{ $errors->first('house_id') }}</span>
                            @endif
                        </div>
                        

                        <!-- block -->
                        <div class="col-md-2">
                            <label for="block_id" class="col-md-12 col-form-label text-md-end text-start">Block</label>
                            <select class="form-control @error('block') is-invalid @enderror" id="block-dropdown" name="block">
                            </select>     
                            
                            
                            @if ($errors->has('block'))
                                <span class="text-danger">{{ $errors->first('block') }}</span>
                            @endif
                        </div>

                         <!-- block no -->
                         <div class="col-md-2">
                            <label for="block_no" class="col-md-12 col-form-label text-md-end text-start">Block No.</label>
                            <select class="form-control @error('block_no') is-invalid @enderror" id="block-no-dropdown" name="block_no">
                            </select>     
                            
                            
                            @if ($errors->has('block_no'))
                                <span class="text-danger">{{ $errors->first('block_no') }}</span>
                            @endif
                        </div>

                         <!-- block sub   -->
                         <div class="col-md-2">
                            <label for="block_sub" class="col-md-12 col-form-label text-md-end text-start">Block SubNo.</label>
                            <select class="form-control @error('block_sub') is-invalid @enderror" id="block-sub-dropdown" name="block_sub">
                            </select>     
                            
                            
                            @if ($errors->has('block_sub'))
                                <span class="text-danger">{{ $errors->first('block_sub') }}</span>
                            @endif
                        </div>    

                    </div>
                    
                    <!-- bast -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="bast_date" class="col-md-12 col-form-label text-md-end text-start">BAST Date</label>
                                <div class="input-group date" id="datebast" data-target-input="nearest">
                                    
                                    <input type="text" class="form-control datetimepicker-input @error('bast_date') is-invalid @enderror" data-target="#datebast" name="bast_date" value="{{ old('bast_date') }}">
                                    
                                    <div class="input-group-append" data-target="#datebast" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            
                            
                            @if ($errors->has('bast_date'))
                                <span class="text-danger">{{ $errors->first('bast_date') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="renovation_date" class="col-md-12 col-form-label text-md-end text-start">Renovation Date</label>
                                <div class="input-group date" id="daterenov" data-target-input="nearest">
                                    
                                    <input type="text" class="form-control datetimepicker-input @error('renov_date') is-invalid @enderror" data-target="#daterenov" name="renov_date" value="{{ old('renov_date') }}">
                                    
                                    <div class="input-group-append" data-target="#daterenov" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            
                            
                            @if ($errors->has('renov_date'))
                                <span class="text-danger">{{ $errors->first('renov_date') }}</span>
                            @endif
                        </div>
                        <!-- waranty date -->
                        <div class="col-md-4">
                            <label for="war_date" class="col-md-12 col-form-label text-md-end text-start">Waranty Date</label>
                                <div class="input-group date" id="datewar" data-target-input="nearest">
                                    
                                    <input type="text" class="form-control datetimepicker-input @error('war_date') is-invalid @enderror" data-target="#datewar" name="war_date" value="{{ old('war_date') }}">
                                    
                                    <div class="input-group-append" data-target="#datewar" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            
                            
                            @if ($errors->has('war_date'))
                                <span class="text-danger">{{ $errors->first('war_date') }}</span>
                            @endif
                        </div>
                        
                        <!-- waranty date -->
                    </div>   

                    <!-- subject -->
                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Subject</label>
                        
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- status and priority -->
                    <div class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label  class="col-md-4 col-form-label text-md-end text-start">Status</label> 
                            <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
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

                        <div class="col-md-4">
                            <label  class="col-md-4 col-form-label text-md-end text-start">Priority</label> 
                            <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                                @foreach ($priorities as $priority)
                                    @if($priority->id==old('type_id'))
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
                    <!-- Item Compliences -->
                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="message" class="col-md-10 col-form-label text-md-end text-start" style="display: block">Item Compliences</label>
                            @foreach($items as $key=>$item)                        
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox"  name="item_id[]" class="custom-control-input" id="custom{{$key}}" value="{{$item->id}}"">
                                <label for="custom{{$key}}" class="custom-control-label">{{$item->itemDescription}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="message" class="col-md-10 col-form-label text-md-end text-start">Message</label>
                            <textarea class="ckeditor form-control" name="message">{{old('message')}}</textarea>                        
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- Attachment -->
                    <div class="mb-3">
                        <div class="col-md-12">
                            <label for="attachment" class="col-md-10 col-form-label text-md-end text-start">Select Files :</label>
                            <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment[]" multiple >
                        
                            @if ($errors->has('attachment'))
                                <span class="text-danger">{{ $errors->first('attachment') }}</span>
                            @endif
                        </div>
                    </div> 
                
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Submit Ticket">
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
    <!-- <script> console.log('Hi!'); </script> -->
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="/vendor/moment/moment.min.js"></script>
    <script src="/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                        format: 'YYYY-MM-DD'
                });

                $('#datebast').datetimepicker({
                        format: 'YYYY-MM-DD'
                });
                $('#datewar').datetimepicker({
                        format: 'YYYY-MM-DD'
                });

                $('#daterenov').datetimepicker({
                        format: 'YYYY-MM-DD'
                });

               
            });
    </script>

    <script>
        $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Cluster Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            var alpha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
            $('#cluster-dropdown').on('change', function () {
                var cluster_id = this.value;
                $("#house-dropdown").html('');
                $.ajax({
                    url: "{{url('tickets/fetchtype')}}",
                    type: "POST",
                    data: {
                        cluster_id: cluster_id,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#house-dropdown').html('<option value="">-- Select House Type --</option>');
                        $.each(result.houses, function (key, value) {
                            
                            $("#house-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        var blok=result.blocks;
                        $("#block-dropdown").html('<option value="">--  Blok --</option>');
                        for(var i=alpha.indexOf(blok.alpha1.substr(1,1));i<=alpha.indexOf(blok.alpha2.substr(1,1));i++){
                            $("#block-dropdown").append('<option value="'+ blok.alpha1.substr(0,1) + alpha[i] +'">'+
                            blok.alpha1.substr(0,1) + alpha[i]
                            +
                            '</option>');
                        }

                        $("#block-no-dropdown").html('<option value="">-- No Blok --</option>');
                        for(var i=blok.num1;i<=blok.num2;i++){
                            $("#block-no-dropdown").append('<option value="'+ i +'">'+i+'</option>');
                        }
                        //console.log(result.sub_blocks.sub_no_block.split(";"));
                        var sub_no_block=result.sub_blocks.sub_no_block.split(";");
                        $("#block-sub-dropdown").html('<option value="">-- Sub Blok --</option>');
                        for(var i=0;i<sub_no_block.length;i++){
                            $("#block-sub-dropdown").append('<option value="'+ sub_no_block[i] +'">'+sub_no_block[i]+'</option>');
                        }
                        
                    }
                });
            });
  
            
  
        });
    </script>
@stop
