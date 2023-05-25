@extends('layouts.dashboard')

@section('owner')
    <div class="d-sm-flex align-items center justify-content-between mb-4">
        <h1 class="h3 text-gray-800 mb-0">
            Kelola Users
        </h1>
    </div>

    <div class="row">
        <div class="container">
            <div class="card mb-4">
                <div class="card-header d-flex align-items center justify-content-between">
                    <h6 class="mb-0 font-weight-bold text-primary">
                        Kelola Users
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)                                
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ Str::limit($dt->name, 10, '...')}}</td>
                                    <td>{{$dt->username}}</td>
                                    <td>{{ Str::limit($dt->email, 23, '...') }}</td>
                                    <td>{{$dt->role->nama}}</td>
                                    <td>
                                        <a href="/users/{{Crypt::encrypt($dt->id)}}/edit" class="btn btn-primary"><i class="fas fa-edit text-white-50"></i> Edit</a>
                                        <a href="/users/{{Crypt::encrypt($dt->id)}}/delete" class="btn btn-danger"><i class="fas fa-trash text-white-50"></i> Delete</a>
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