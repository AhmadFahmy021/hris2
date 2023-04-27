@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Divisi</h1>
    <a href="/divisi/create" class="btn btn-primary btn-sm"><i class="fas fa-plus text-white-50"></i> Tambah Divisi</a>
</div>

<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 text-primary font-weight-bold">
                    Daftar Divisi 
                </h6>
            </div>
            <div class="card-body justify-content-center">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $it)        
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$it->divisi}}</td>
                                    <td class="text-center">
                                        <a href="/divisi/{{Crypt::encrypt($it->id)}}/edit" class="btn btn-primary"><i class="fas fa-pen text-white-50"></i> Edit</a>
                                        <form action="/divisi/{{Crypt::encrypt($it->id)}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-white-50"></i> Delete</button>
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