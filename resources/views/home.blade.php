@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">All Tickets</span>
                <span class="info-box-number">
                    {{number_format($chartdata['tickets']['all_tikets'],0,".",",")}} 
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Start Tickets</span>
                <span class="info-box-number">{{number_format($chartdata['tickets']['start_tikets'],0,".",",")}}</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Start Tickets</span>
                <span class="info-box-number">{{number_format($chartdata['tickets']['open_tikets'],0,".",",")}}</span>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Progress Tickets</span>
                <span class="info-box-number">{{number_format($chartdata['tickets']['progress_tikets'],0,".",",")}}</span>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Close Tickets</span>
                <span class="info-box-number">{{number_format($chartdata['tickets']['close_tikets'],0,".",",")}}</span>
            </div>
        </div>
    </div>
    <!-- ticket hold -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="far fa-eye"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Hold Tickets</span>
                <span class="info-box-number">{{number_format($chartdata['tickets']['hold_tikets'],0,".",",")}}</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Tickets By Month at {{date('Y')}}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;" 
                        width="604" 
                        height="250" 
                        class="chartjs-render-monitor">
                </canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tickets By Status</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;"
                        width="604"
                        height="250"
                        class="chartjs-render-monitor">
                </canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Tickets By Complience Type</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas id="pieChart_complience" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;"
                        width="604"
                        height="250"
                        class="chartjs-render-monitor">
                </canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Tickets By Complience Item group</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>    
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class="">
                        </div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class="">
                        </div>
                    </div>
                </div>
                <canvas id="barChart_items" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 604px;" 
                        width="604" 
                        height="250" 
                        class="chartjs-render-monitor">
                </canvas>
            </div>
        </div>
    </div>
</div>




@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
    <script>
  $(function () { 

    var areaChartData = {
      labels  :{!! json_encode($chartdata['label_of_months']) !!},
      datasets: [
        {
          label               : 'Tickets',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!! json_encode($chartdata['data_kate1']) !!}
        },
       
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
    //-----------batas bar chart
    var donutData = {
      labels:{!! json_encode($chartdata['label_pie']) !!},
      datasets: [
        {
          data: {!! json_encode($chartdata['data_pie']) !!},
          backgroundColor :{!! json_encode($chartdata['colour_pie']) !!},
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

     //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //------------- 
    //- PIE CHART COMPLAINCE ITEMS-
    //-------------

    var items_complain = {
      labels:{!! json_encode($chart_pie_complain['label_pie']) !!},
      datasets: [
        {
          data: {!! json_encode($chart_pie_complain['data_pie']) !!},
          backgroundColor :{!! json_encode($chart_pie_complain['bg_pie']) !!},
        }
      ]
    }

    var pieChartCanvas_complience = $('#pieChart_complience').get(0).getContext('2d')
    var pieData_items        = items_complain;
    var pieOptions_items     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas_complience, {
      type: 'pie',
      data: pieData_items,
      options: pieOptions_items
    })
    //------------- batas pie chart items

    //-------------item complaince chart
    var areaChartData_items = {
      labels  :{!! json_encode($chart_item_complain['label_item']) !!},
      datasets: [
        {
          label               : 'Complaince',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : {!! json_encode($chart_item_complain['data_item']) !!}
        },
       
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart_items').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData_items)
    var temp0 = areaChartData_items.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>
@stop