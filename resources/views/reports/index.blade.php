@extends('adminlte::page')
@section('title', 'Report Ticket')

@section('css')
<link rel="stylesheet" href="/vendor/daterangepicker/daterangepicker.css"> 
@stop
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Reports</h3>
                <div class="card-tools">
                    <a href="{{route('reports.export')}}" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Download</a>
                </div>
                
            </div>
            <div class="card-body">
                <!-- Date range -->
                <div class="mb-3 row">
                    <div class="col-md-4">
                    <form action="{{route('reports.search')}}" method="post">
                    @csrf
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="daterange" class="form-control float-right" id="reservation">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-search"></i> Search</button>
                        <a href="{{route('reports')}}" class="btn btn-danger btn-md"><i class="fas fa-times"></i> Reset</a>
                    </div> 
                    </form>
                </div>
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Ticket Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Complience Date
                                        </th>
                                        
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Customer
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Cluster
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Blok
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            No.
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Type
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Status
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            C.type
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Message
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Approval Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            BAST Date
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">
                                            Due Date
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                    <tr class="odd">
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->complain_date)->format('d-m-Y') }}</td>
                                        <td>{{ $ticket->custname }}</td>
                                        <td>{{ $ticket->cluster->name }}</td>
                                        <td>{{ $ticket->block }}</td>
                                        <td>{{ $ticket->block_no }} {{ $ticket->block_sub }}</td>
                                        <td>{{ $ticket->house->name }}</td>
                                        <td>{{ $ticket->status->name }}</td>
                                        <td>{{ $ticket->complain->type }}</td>
                                        <td>{!! $ticket->message !!}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->level2_confirm_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->bast_date)->format('d-m-Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($ticket->due_date)->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>    
@endsection

@section('js')
<script src="/vendor/moment/moment.min.js"></script>
<script src="/vendor/daterangepicker/daterangepicker.js"> </script>
<script type="text/javascript">
    $(function () {
        //Date range picker
        $('#reservation').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        })
    });
</script>
@stop