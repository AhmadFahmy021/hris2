@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jurnal</h1>
    <a href="/jurnal/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Tambah Jurnal
    </a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 text-primary font-weight-bold">
                    Daftar Jurnal Harian
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Status</th>
                                <th>Tanggal Menulis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->nama}}</td>
                                <td>{{date('d-m-Y', strtotime($d->tanggal))}}</td>
                                <td>{{$d->status}}</td>
                                <td>{{date('d-m-Y', strtotime($d->created_at))}}</td>
                                @php
                                    $jurnal = Crypt::encrypt($d->id);
                                @endphp
                                <td>
                                    <a href="/jurnal/{{$jurnal}}/edit" class="btn btn-primary"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</a>
                                    <form action="/jurnal/{{$jurnal}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</button>
                                    </form>
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
@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jurnal</h1>
    <a href="/jurnal/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Tambah Jurnal
    </a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 text-primary font-weight-bold">
                    Daftar Jurnal Harian
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Status</th>
                                <th>Tanggal Menulis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$d->nama}}</td>
                                <td>{{date('d-m-Y', strtotime($d->tanggal))}}</td>
                                <td>{{$d->status}}</td>
                                <td>{{date('d-m-Y', strtotime($d->created_at))}}</td>
                                @php
                                    $jurnal = Crypt::encrypt($d->id);
                                @endphp
                                <td>
                                    <a href="/jurnal/{{$jurnal}}/edit" class="btn btn-primary"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</a>
                                    <form action="/jurnal/{{$jurnal}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</button>
                                    </form>
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