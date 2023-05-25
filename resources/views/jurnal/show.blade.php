@extends('layouts.dashboard')

@section('owner')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 mb-0">
            Pantau Jurnal Karyawan
        </h1>
    </div>

    <div class="row">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0 font-weight-bold text-primary">
                        Pantau Jurnal Karyawan {{$user->name}}
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->tanggal}}</td>
                                    <td>{{$dt->status}}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection