@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <div class="dropdown">
        <button class="btn btn-sm btn-primary " type="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-plus text-white-50"></i>
            Tambah Tugas
        </button>
        <div class="dropdown-menu dropdown-menu-right ">
          <a class="dropdown-header">Pilih Tugas Secara : </a>
          <a class="dropdown-item" href="/tugas/create">Tugas Karyawan</a>
          <a class="dropdown-item" href="/tugass/tim/create">Tugas Divisi</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Divisi</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Halaman :</div>
                        <a class="dropdown-item" href="/tugas">Tugas Karyawan</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Tim</th>
                                <th>Tugas</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)                                
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    @if ($d->devisi_id == null)
                                        
                                    <td>{{$d->divisi->divisi}}</td>
                                    @else
                                    <td>{{$d->divisi->divisi}}</td>
                                        
                                    @endif
                                    <td>{{$d->tugas}}</td>
                                    @if ($d->selesai == null)
                                    <td>Waktu deadline tidak ada batas</td>
                                    @else
                                    <td>{{$d->selesai}}</td>                                    
                                    @endif
                                    <td>
                                        <a href="/tugass/tim/{{Crypt::encrypt($d->id)}}/edit" class="btn btn-primary"><i class="fas fa-pen text-white-50"></i></a>
                                        <a href="/tugass/tim/{{Crypt::encrypt($d->id)}}/delete" class="btn btn-danger"><i class="fas fa-trash text-white-50"></i></a>
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
@include('sweetalert::alert')
@endsection
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Divisi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tugas</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)                                
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td title="{{$d->tugas}}">{{Str::limit($d->tugas, 15, '...')}}</td>
                                    @if ($d->selesai == null)
                                        <td>Waktu selesai tidak batas</td>
                                    @else
                                        <td>{{$d->selesai}}</td>                                    
                                    @endif
                                    <td class="text-uppercase">{{$d->status}}</td>
                                    <td>
                                        <a href="/divisi/tugas/{{Crypt::encrypt($d->id)}}/selesai" class="btn btn-primary"><i class="fas fa-check text-white-50"></i> Selesai</a>
                                        <a href="/divisi/tugas/{{Crypt::encrypt($d->id)}}/tunda" class="btn btn-danger"><i class="fas fa-times text-white-50"></i> Tunda</a>
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
@include('sweetalert::alert')
@endsection