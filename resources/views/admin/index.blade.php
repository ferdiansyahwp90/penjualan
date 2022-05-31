@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>Penjulan Beras H. Roni</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('admin.create') }}"> Input Admin</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>id_admin</th>
        <th>Nama_admin</th>
        <th>No_hp</th>
        <th>Email</th>
        <th>Alamat</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($admin as $adm)
    <tr>
        <td>{{ $adm ->id_admin }}</td>
        <td>{{ $adm ->nama_admin }}</td>
        <td>{{ $adm ->no_hp }}</td>
        <td>{{ $adm ->email }}</td>
        <td>{{ $adm ->alamat }}</td>
        <td>
        <form action="{{ route('admin.destroy',['admin'=>$adm->id_admin]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('admin.show',$adm->id_admin) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('admin.edit',$adm->id_admin) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
