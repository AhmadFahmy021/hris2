@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <span class="gaji" id="gaji" data-nama="{{$nama}}"  data-target="{{$date}}"></span>
</div>

<!-- Content Row -->
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
                            Pengajuan Cuti
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cuti}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                            Jumlah Divisi
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$divisi}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tugas_selesai}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chart Tugas Yang Di Selesaikan Oleh Karyawan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
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
                <h6 class="m-0 font-weight-bold text-primary">Rating Jurnal Selesai Karyawan </h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
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
<script>
    Push.Permission.request();
    // if()
    const gaji = document.querySelector('#gaji') ;
    const target = gaji.getAttribute('data-target');
    const nama = gaji.getAttribute('data-nama');
    // console.log(target);
    // set tanggal target
    const targetDate = new Date(target);

    // fungsi untuk menghitung mundur waktu
    function countdown() {
    // hitung selisih waktu antara target dan saat ini
    const now = new Date().getTime();
    const diff = targetDate - now;
    // console.log(diff);

    // hitung sisa waktu dalam hari, jam, menit, dan detik
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    // tampilkan sisa waktu pada notifikasi
    const countdownElem = document.querySelector('.gaji');
    countdownElem.innerHTML = `${days.toString().padStart(2, "0")}:${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

    // cek jika hari target sama dengan hari sekarang, jika hari tidak sama dengan target maka lanjutkan perhitungan, dan jika target
    if(new Date().getDate() === new Date(targetDate).getDate())
    {
        // cetak keterangan yang menunjukkan hari pengambilan gaji
        // console.log(nama);
        if(nama == 'Seluruh Karyawan'){
            countdownElem.innerHTML = 'Hari ini waktunya pembagian gaji '+nama;
            Push.create('Pembagian Gaji Karyawan Tiba', {
            body: 'Sekarang waktu pembagian gaji telah tiba silahkan kirim gaji ke rekening masing - masing karyawan',
            // timeout: 2400000,               // Timeout before notification closes automatically.
            vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
            onClick: function() {
                // Callback for when the notification is clicked.
                console.log(this);
            }
        });
        } else{
            countdownElem.innerHTML = 'Hari ini waktunya pembagian gaji atas nama '+nama;
            Push.create('Pembagian Gaji Karyawan Tiba', {
            body: 'Sekarang waktu pembagian gaji telah tiba silahkan kirim gaji ke rekening atas nama '+nama,
            // timeout: 2400000,               // Timeout before notification closes automatically.
            vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
            onClick: function() {
                // Callback for when the notification is clicked.
                console.log(this);
            }
        });
        }
        

        }else if (diff < 0) {
        // ubah tanggal target menjadi tanggal bulan depan
        targetDate.setMonth(targetDate.getMonth() + 1);

        // restart hitungan mundur
        setTimeout(countdown, 0);
    } else {
        // lanjutkan hitungan mundur
        setTimeout(countdown, 1000);
    }
    }

    // panggil fungsi hitung mundur
    countdown();

 
</script>
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <span class="gaji" id="gaj" data-tanggal="{{$gaji->date_gaji}}"></span>
    <a href="/slip-gaji" target="_blank" hidden class="tmb btn btn-primary btn-sm"><i class="fas fa-download text-white-50"></i> Download Slip Gaji</a>
</div>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Jurnal
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$jurnalkar}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                            Jumlah Tugas
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$tugas}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
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
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{$cuti}}
                                </div>
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
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Pengajuan Cuti Di Setujui
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{$cutiSetuju}}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- card --}}
<div class="row">

    <!-- Daftar Tugas -->
    <div class="col-xl-6 col-lg-7">
        <div class="card shadow mb-4" style="height: 493px;">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Individu</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="overflow: auto;">
                <div class="chart">
                    @foreach ($tugasIndiv as $tI)
                        <div class="alert alert-info alert-sm">
                            @if ($tI->selesai == null && $tI->status == null)
                                {{$tI->tugas}} | Tidak Terbatas | Belum Dikerjakan
                            @elseif($tI->selesai == null)
                                {{$tI->tugas}} | Tidak Terbatas | {{$tI->status}}
                            @elseif($tI->status == null)
                                {{$tI->tugas}} | {{date('d-M-Y', strtotime($tI->selesai)) }} | Belum Dikerjakan
                            @else
                                {{$tI->tugas}} | {{date('d-M-Y', strtotime($tI->selesai)) }} | {{$tI->status}}
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Tugas Divisi -->
    <div class="col-xl-6 col-lg-5" >
        <div class="card shadow-lg mb-4" style="height: 493px; ">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Divisi</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="overflow: auto;">
                <div class="chart">
                    @foreach ($tugasDiv as $td)
                    @if ($td->divisi_id != null)                            
                        <div class="alert alert-info alert-sm">
                            @if ($td->selesai == null && $td->status == null)
                            {{$td->tugas}} | Tidak Terbatas | Belum Dikerjakan
                            @elseif($td->status == null)
                            {{$td->tugas}} | {{date('d-M-Y', strtotime($td->selesai)) }} | Belum Dikerjakan
                            @else
                            {{$td->tugas}} | {{date('d-M-Y', strtotime($td->selesai)) }} | {{$td->status}}
                            @endif
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    {{-- <div class="col-xl-4 col-lg-5" >
        <div class="card shadow-lg mb-4" style="height: 493px; ">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Rating Kerja Karyawan Jurnal Telah Selesai</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="overflow: auto;">
                <div class="chart" >
                </div>
            </div>
        </div>
    </div> --}}
    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/0.0.11/push.min.js"></script>
<script>
    Push.Permission.request();
    const btn = document.getElementById('gaj');
    const date = btn.getAttribute('data-tanggal');
    // console.log(date);
    // set tanggal target
    const targetDate = new Date(date);
    // console.log(targetDate);
    // fungsi untuk menghitung mundur waktu
    function countdown() {
    // hitung selisih waktu antara target dan saat ini
    const now = new Date().getTime();
    const diff = targetDate - now;
    // console.log(diff);
    
    // hitung sisa waktu dalam hari, jam, menit, dan detik
    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);
    
    // tampilkan sisa waktu pada notifikasi
    const countdownElem = document.querySelector('.gaji');
    countdownElem.innerHTML = `${days.toString().padStart(2, "0")}:${hours.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;

    // cek jika hari target sama dengan hari sekarang, jika hari tidak sama dengan target maka lanjutkan perhitungan, dan jika target
    // if(new Date().getMinutes() === new Date(targetDate).getMinutes() && new Date().getHours() === new Date(targetDate).getHours()  && new Date().getDate() === new Date(targetDate).getDate())
    Push.Permission.request();
    if(new Date().getDate() === new Date(targetDate).getDate())
    {
        // cetak keterangan yang menunjukkan hari pengambilan gaji
        // console.log('Waktu Gajian');
        // countdownElem.innerHTML = 'Hari ini waktunya pembagian gaji karyawan';
        var down = document.querySelector('.tmb');
        down.removeAttribute("hidden");
        countdownElem.setAttribute("hidden",true);
        Push.create('Hari Ini Waktu Gajian Telah Tiba', {
            body: 'Silahkan Cek Rekening Jika Sudah Masuk Silahkan Download Slip Gaji',
            // timeout: 2400000,               // Timeout before notification closes automatically.
            vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
            onClick: function() {
                // Callback for when the notification is clicked.
                console.log(this);
            }
        });

        }else if (diff < 0) {
        // ubah tanggal target menjadi tanggal bulan depan
        targetDate.setMonth(targetDate.getMonth() + 1);

        // restart hitungan mundur
        setTimeout(countdown, 0);
    } else {
        // lanjutkan hitungan mundur
        setTimeout(countdown, 1000);
    }
    }

    // panggil fungsi hitung mundur
    countdown();

</script>
@endsection
