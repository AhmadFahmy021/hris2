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
                                    <td title="{{$dt->user->name}}">{{Str::limit($dt->user->name, 10, '...')}}</td>
                                    @if ($dt->divisi_id === null)
                                    <td></td>
                                    @else
                                    <td>{{$dt->divisi->divisi}}</td>
                                    @endif
                                    <td title="{{$dt->jabatan}}">{{Str::limit($dt->jabatan, 10, '...')}}</td>
                                    <td>{{$dt->hp}}</td>
                                    @php
                                        $id = Crypt::encrypt($dt->id);
                                    @endphp
                                    <td>
                                        <a href="/karyawan/{{$id}}/detail" class="btn btn-success"><i class="fas fa-eye"></i> Detail</a>
                                        <a href="/karyawan/{{$id}}/edit" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                        <a href="/karyawan/{{$id}}/delete" id="delete" class="btn btn-danger"><i class="fas fa-trash text-white-50"></i> Delete</a>
                                        {{-- <form action="/karyawan/{{$id}}/delete" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                        </form> --}}
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
@include('sweetalert::alert')
@endsection