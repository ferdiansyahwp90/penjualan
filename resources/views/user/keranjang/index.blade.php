@extends('user.layouts.app')

@section('content')

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        {{-- <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
              <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                  <h4 class="page-title">Keranjang</h4>
              </div>
          </div>
          <!-- /.col-lg-12 -->
      </div> --}}
      <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Keranjang</h3>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID Keranjang</th>
                                            <th class="border-top-0">ID Beras</th>
                                            <th class="border-top-0">Total Harga</th>
                                            <th class="border-top-0">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjang as $item)    
                                        <tr>
                                            <td>{{ $item->id_keranjang }}</td>
                                            <td>{{ $item->id_beras }}</td>
                                            <td>{{ $item->totalharga }}</td>
                                            <td>{{ $item->jumlah }}</td>

                                            <td>
                                                <a href="/user/keranjang/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            @endsection