@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Divisi</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/divisi" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nama Divisi</label>
                <input type="text" class="form-control" name="divisi">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection