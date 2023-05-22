@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Gaji Karyawan</h1>
    <a href="/gaji/create" class="d-inline d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> 
        Tambah Gaji Karyawan
    </a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 text-primary font-weight-bold">
                    Daftar Gaji Karyawan
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Gaji Pokok</th>
                                <th>Gaji Tunjangan</th>
                                <th>Gaji Bonus</th>
                                <th>Gaji Lembur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dt->user->name}}</td>
                                    <td>{{$dt->pokok}}</td>
                                    <td>{{$dt->tunjangan}}</td>
                                    <td>{{$dt->bonus}}</td>
                                    <td>{{$dt->lembur}}</td>
                                    <td>
                                        <a href="/gaji/{{Crypt::encrypt($dt->id)}}/edit" class="btn btn-primary"><i class="fas fa-edit text-white-50"></i> Edit</a>
                                        <a href="/gaji/{{Crypt::encrypt($dt->id)}}" class="btn btn-danger" data-confirm-delete="true"><i class="fas fa-trash text-white-50"></i> Delete</a>
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