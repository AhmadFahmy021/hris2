@extends('layouts.dashboard')

@section('owner')
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
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
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Divisi
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
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
                    <div class="alert alert-warning text-center">
                        User | Tugas
                    </div>
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
                    <div class="alert alert-primary text-center">
                        Divisi | Tugas
                    </div>
                    <div class="alert alert-primary text-center">
                        Divisi | Tugas
                    </div>
                    <div class="alert alert-primary text-center">
                        Divisi | Tugas
                    </div>
                    <div class="alert alert-primary text-center">
                        Divisi | Tugas
                    </div>
                    <div class="alert alert-primary text-center">
                        Divisi | Tugas
                    </div>
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
                    <div class="alert alert-success text-center">
                        User | Selesai
                    </div>
                    <div class="alert alert-success text-center">
                        User | Selesai
                    </div>
                    <div class="alert alert-success text-center">
                        User | Selesai
                    </div>
                    <div class="alert alert-success text-center">
                        User | Selesai
                    </div>
                    <div class="alert alert-success text-center">
                        User | Selesai
                    </div>
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
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                    <div class="alert alert-primary text-center">
                        User | Ajukan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        
    </div>
@endsection