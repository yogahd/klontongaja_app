@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div>
    <div class="col-lg-12 col-xlg-3 col-md-12">
        <div class="white-box">
                <div class="overlay-box">
                    <div class="user-content">
                        <center><h3>Selamat Datang !</h3></center>
                        <center><h2>Sistem Pengelolaan Data Barang dan Keuangan</h2></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xlg-3 col-md-12">
        <div class="white-box">
            <div class="user-bg">
                <center><img width="45%" alt="user" src="{{ asset('assets/plugins/images/logo-klontong.png') }}"></center>
            </div>
        </div>
    </div>
</div>
<!-- /.row (main row) -->
@endsection

@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-2/bower_components/chart.js/Chart.js') }}"></script>
<script>
$(function() {
    // Get context with jQuery - using jQuery's .get() method.
    var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas);

    var salesChartData = {
        labels: {{ json_encode($data_tanggal) }},
        datasets: [
            {
                label: 'Pendapatan',
                fillColor           : 'rgba(60,141,188,0.9)',
                strokeColor         : 'rgba(60,141,188,0.8)',
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: {{ json_encode($data_pendapatan) }}
            }
        ]
    };

    var salesChartOptions = {
        pointDot : false,
        responsive : true
    };

    salesChart.Line(salesChartData, salesChartOptions);
});
</script>
@endpush