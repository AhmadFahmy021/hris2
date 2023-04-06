@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
    <a href="" class="d-inline d-sm-inline btn btn-sm btn-primary shadow-sm "><i class="fas fa-plus text-white-50"></i> Tambah Tugas</a>
</div>

<div class="row">
    <div class="container">
        <form action="/tugas" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <select class="custom-select">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tugas</label>
                <input type="text" class="form-control">
            </div>
        </form>
    </div>
</div>
@endsection