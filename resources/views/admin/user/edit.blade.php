@extends('admin.layouts.app')

@section('content')

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Users</h4>
              </div>
          </div>
          <!-- /.col-lg-12 -->
      </div>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9">
                    <div class="card">
                        <div class="card-body">
                        <form class="form-horizontal form-material mx-2" action="/admin/user/{{ $user->id }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" placeholder="Email"
                                class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Name"
                                class="form-control form-control-line @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-12">Number Phone</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="no_hp"
                                class="form-control form-control-line @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ $user->no_hp }}">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="form-group">
                            <label class="col-md-12">Role</label>
                            <div class="col-md-12">
                                <select name="role" id="role" class="form-control form-control-line @error('role') is-invalid @enderror">
                                <option value="{{ 'admin' }}" {{ ($user->role == 'admin') ? 'selected' : '' }}>{{ 'Admin' }}</option>
                                <option value="{{ 'customer' }}" {{ ($user->role == 'pengguna') ? 'selected' : '' }}>{{ 'Pengguna' }}</option>
                                </select>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success text-white">Submit</button>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection