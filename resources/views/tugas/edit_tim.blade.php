@extends('layouts.dashboard')

@section('dashboard')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tugas</h1>
</div>

<div class="row">
    <div class="container">
        <form action="/tugass/tim/{{Crypt::encrypt($ed->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <lable class="form-label">Divisi</lable>
                <select name="divisi" id="" class="form-control">
                    @foreach ($data as $d)                        
                        <option value="{{$d->id}}" @if ($ed->divisi_id == $d->id)
                            selected
                        @endif>{{$d->divisi}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <lable class="form-label">Tugas </lable>
                <textarea id="" rows="3" class="form-control" name="tugas"> {{$ed->tugas}} </textarea>
            </div>
            <div class="mb-3">
                <lable class="form-label">Deadline</lable>
                <input type="date" class="form-control" name="selesai" value="{{$ed->selesai}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection