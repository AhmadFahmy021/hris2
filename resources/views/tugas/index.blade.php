@extends('layouts.dashboard')

@section('owner')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="/kelola/tugas/karyawan/create" class="btn btn-primary btn-sm"><i class="fas fa-plus text-white-50"></i> Tambah Tugas Karyawan</a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Karyawan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Halaman :</div>
                        <a class="dropdown-item" href="/tugass/tim">Tugas Divisi</a>
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
                                <th>Tugas</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td title="{{$dt->user->name}}">{{Str::limit($dt->user->name, 10, '...') }}</td>
                                    <td title="{{$dt->tugas}}">{{Str::limit($dt->tugas, 15, '...')}}</td>
                                    <td class="text-uppercase">
                                        @if ($dt->status == null)
                                            <p>Belum dikerjakan</p>
                                        @else
                                            <p>{{$dt->status}}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dt->selesai == null)
                                            Tidak Ada Batas
                                        @else
                                            {{date('d-m-Y', strtotime($dt->selesai))}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/kelola/tugas/karyawan/{{Crypt::encrypt($dt->id)}}/edit" class="btn btn-primary"><i class="fas fa-pen text-white-50"></i> Edit</a>
                                        <a href="/kelola/tugas/karyawan/{{Crypt::encrypt($dt->id)}}/delete" class="btn btn-danger" id="delete"><i class="fas fa-trash text-white-50"></i> Delete</a>
                                        {{-- <form action="/tugas/{{Crypt::encrypt($dt->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengapus tugas {{$dt->tugas}}')"><i class="fas fa-trash text-white-50"></i> Delete</button>
                                        </form> --}}
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
@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <div class="dropdown">
        <button class="btn btn-sm btn-primary " type="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-plus text-white-50"></i>
            Tambah Tugas
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-header">Pilih Tugas Secara : </a>
          <a class="dropdown-item" href="/tugas/create">Tugas Untuk Setiap Karyawan</a>
          <a class="dropdown-item" href="/tugass/tim/create">Tugas Untuk Setiap Divisi</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Karyawan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Halaman :</div>
                        <a class="dropdown-item" href="/tugass/tim">Tugas Divisi</a>
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
                                <th>Tugas</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td title="{{$dt->user->name}}">{{Str::limit($dt->user->name, 10, '...') }}</td>
                                    <td title="{{$dt->tugas}}">{{Str::limit($dt->tugas, 15, '...')}}</td>
                                    <td class="text-uppercase">
                                        @if ($dt->status == null)
                                            <p>Belum dikerjakan</p>
                                        @else
                                            <p>{{$dt->status}}</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($dt->selesai == null)
                                            Tidak Ada Batas
                                        @else
                                            {{date('d-m-Y', strtotime($dt->selesai))}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/tugas/{{Crypt::encrypt($dt->id)}}/edit" class="btn btn-primary"><i class="fas fa-pen text-white-50"></i> Edit</a>
                                        <a href="/tugas/{{Crypt::encrypt($dt->id)}}/delete" class="btn btn-danger" id="delete"><i class="fas fa-trash text-white-50"></i> Delete</a>
                                        {{-- <form action="/tugas/{{Crypt::encrypt($dt->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin mengapus tugas {{$dt->tugas}}')"><i class="fas fa-trash text-white-50"></i> Delete</button>
                                        </form> --}}
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Tugas Karyawan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tugas</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td title="{{$dt->tugas}}"> {{Str::limit($dt->tugas, 20, '...') }} </td>
                                    <td> @if ($dt->status == null) <p>Belum dikerjakan</p> @else <p>{{$dt->status}}</p> @endif</td>
                                    @if ($dt->selesai == null)
                                        <td>Tidak Ada Batas</td>
                                    @else
                                        <td>{{date('d-m-Y', strtotime($dt->selesai))}}</td>
                                    @endif
                                    {{-- <td> {{$dt->d}} </td> --}}
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-info" type="button" data-toggle="dropdown" aria-expanded="false">
                                              Ubah Status
                                            </a>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="/tugass/{{Crypt::encrypt($dt->id)}}/selesai">Selesai</a>
                                              <a class="dropdown-item"  href="/tugass/{{Crypt::encrypt($dt->id)}}/tunda">Tunda</a>
                                            </div>
                                          </div>
                                        {{-- <a href="/tugass/{{Crypt::encrypt($dt->id)}}/check" class="btn btn-primary"><i class="fas fa-check text-white-50"></i> Check</a>
                                        <a href="/tugass/{{Crypt::encrypt($dt->id)}}/check" class="btn btn-secondary"><i class="fas fa-times text-white-50"></i> Check</a> --}}
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
