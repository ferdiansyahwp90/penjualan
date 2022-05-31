@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Admin
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Id_admin: </b>{{$Admin->id_admin}}</li>
                    <li class="list-group-item"><b>Nama_admin: </b>{{$Admin->nama_admin}}</li>
                    <li class="list-group-item"><b>Telepon: </b>{{$Admin->no_hp}}</li>
                    <li class="list-group-item"><b>Email: </b>{{$Admin->email}}</li>
                    <li class="list-group-item"><b>Alamat: </b>{{$Admin->alamat}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('admin.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection