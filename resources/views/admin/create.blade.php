@extends('admin.layout')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Tambah Admin
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('admin.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="id_admin">Admin</label>
                    <input type="text" name="id_admin" class="form-control" id="id_admin" aria-describedby="id_admin" >
                </div>
                <div class="form-group">
                    <label for="nama_admin">Nama</label>
                    <input type="nama_admin" name="nama_admin" class="form-control" id="nama_admin" ariadescribedby="nama_admin" >
                </div>
                <div class="form-group">
                    <label for="no_hp">Telepon</label>
                    <input type="no_hp" name="no_hp" class="form-control" id="no_hp" ariadescribedby="no_hp" >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" ariadescribedby="email" >
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="alamat" name="alamat" class="form-control" id="alamat" ariadescribedby="alamat" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>
@endsection