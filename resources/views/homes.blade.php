@extends('layouts.dashboard')

@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

    <!-- Content Row Card  -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Karyawan
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$kar}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Divisi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$div}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Pengajuan Cuti
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$cuti}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Tugas Selesai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tugasS}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Card Untuk Daftar --}}
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mb-4" style="height: 255px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-beetwen">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Daftar Tugas Karyawan
                    </h6>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    @foreach ($tugasK as $tk)
                        <div class="alert alert-warning text-center">
                            <p>{{ Str::limit($tk->user->name, 15, '...') }}</p> <p title="{{ Str::limit($tk->tugas, 15, '...') }}">{{ Str::limit($tk->tugas, 15, '...') }} | {{$tk->status}}</p> 
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mb-4" style="height: 255px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-beetwen">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Daftar Tugas Divisi
                    </h6>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    @foreach ($tugasD as $td)
                        <div class="alert alert-primary text-center">
                        <p title="{{$td->divisi->divisi}}">{{ Str::limit($td->divisi->divisi, 15, '...') }}</p > <p title="{{$td->tugas}}"> {{ Str::limit($td->tugas, 15, '...') }} | {{$td->status}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mb-4" style="height: 255px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-beetwen">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Daftar Karyawan Cuti
                    </h6>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    @foreach ($cutiK as $ck)
                        <div class="alert alert-success text-center">
                        <p title="{{$ck->user->name}}">{{ Str::limit($ck->user->name, 15, '...') }}</p> {{$ck->selesai}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4">
            <div class="card shadow mb-4" style="height: 255px;">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-beetwen">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Daftar Pengajuan Cuti
                    </h6>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    @foreach ($cutiA as $ca)
                        <div class="alert alert-primary text-center">
                        <p title="{{$ca->user->name}}">{{ Str::limit($ca->user->name, 15, '...') }}</p> <p title="{{$ca->alasan}}">{{ Str::limit($ca->alasan, 20, '...') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Tugas Yang Di Selesaikan Oleh Karyawan</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="panel">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5" >
            <div class="card shadow-lg mb-4" style="height: 493px; ">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Rating Kerja Karyawan (Jurnal) </h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body" style="overflow: auto;">
                    <div class="chart" >
                        @foreach ($jurnal as $jr)
                            <div class="alert alert-primary" role="alert">
                                {{$jr->name}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Chart Tugas Yang Sudah Selesai'
            },
            subtitle: {
                text: 'Penyelesaian Tugas Oleh Karyawan'
            },
            xAxis: {
                categories: {!!json_encode($name)!!},
                // categories: [
                //     'Jan',
                //     'Feb',
                //     'Mar',
                //     'Apr',
                //     'May',
                //     'Jun',
                //     'Jul',
                //     'Aug',
                //     'Sep',
                //     'Oct',
                //     'Nov',
                //     'Dec'
                // ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [
            {
                name: 'Jumlah Tugas Selesai',
                data: {!!json_encode($data)!!}
                // data: [10,50]

            },
        ]
        });
</script>
@endsection