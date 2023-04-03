@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Karyawan</h1>
    
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 text-primary font-weight-bold">
                        Daftar Jumlah Karyawan
                    </h6>
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
                                    <th>No. Hp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $dt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dt->user->name}}</td>
                                    <td>{{$dt->divisi}}</td>
                                    <td>{{$dt->jabatan}}</td>
                                    <td>{{$dt->hp}}</td>
                                    @php
                                        $id = Crypt::encrypt($dt->id);
                                    @endphp
                                    <td>
                                        <a href="/karyawan/{{$id}}/detail" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="/karyawan/{{$id}}/edit" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                        <form action="/karyawan/{{$id}}/delete" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                        {{-- <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a> --}}
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
</div>
@endsection