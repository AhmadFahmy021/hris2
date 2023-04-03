@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cuti</h1>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengajuan Cuti</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Halaman:</div>
                        <a class="dropdown-item text-danger" href="/cuti/tolak"><i class="fas fa-calendar-times"></i> Pengajuan yang ditolak</a>
                        <a class="dropdown-item text-success" href="/cuti/setuju"><i class="fas fa-calendar-check"></i> Pengajuan yang di setujui</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Jabatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dt->user->name}}</td>
                                <td>{{$dt->profile->divisi}}</td>
                                <td>{{$dt->profile->jabatan}}</td>
                                <td>{{date('d-m-Y', strtotime( $dt->mulai))}}</td>
                                <td>{{date('d-m-Y', strtotime( $dt->akhir))}}</td>
                                @php
                                    $id = Crypt::encrypt($dt->id);
                                @endphp
                                <td>
                                    <a href="/cuti/{{$id}}/setuju" class="btn btn-primary"><i class="fas fa-check"></i> Accept</a>
                                    <a href="/cuti/{{$id}}/tolak" class="btn btn-danger"><i class="fas fa-times"></i> Reject</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection