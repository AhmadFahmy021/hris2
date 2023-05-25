@extends('layouts.dashboard')

@section('karyawan')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas Anggota</h1>
    <a href="/anggota/divisi/tugas/create" class="btn btn-primary btn-sm"><i class="fas fa-plus text-white-50"></i> Bagi Tugas Satu Divisi</a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0 font-weight-bold text-primary">
                    Daftar Tugas Yang Dibagi
                </h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tugas</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)    
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dt->user->name}}</td>
                                <td>{{$dt->tugas}}</td>
                                <td>{{$dt->status}}</td>
                                <td>
                                    <a href="" class="btn btn-primary"><i class="fas fa-edit text-white-50"></i> Edit</a>
                                    <a href="" class="btn btn-danger"><i class="fas fa-trash text-white-50"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection