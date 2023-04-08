@extends('layouts.dashboard')

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
          <a class="dropdown-item" href="#">Tugas Untuk Setiap Divisi</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pembagian Tugas</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="/tugass/tim">Lihat Tugas Untuk Seluruh Divisi</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
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
                                <th>Deadline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection