@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Admins List
                        <a href="/admin/add-admin" class="float-right">Add Admin</a>
                        <br><br>
                            <a href="{{route('exportAdminASExcel')}}" target="_blank"><button class="btn btn-success">Export Data as Excel</button></a>
                            <a href="{{route('exportAdminAsCSV')}}" target="_blank"><button class="btn btn-primary">Export Data as CSV</button></a>
                            <a href="{{route('exportAdminAsPDF')}}" target="_blank"><button class="btn btn-danger">Export Data as PDF</button></a>
                        </p>

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Admin Name</th>
                                            <th>Email</th>
                                            <th>Change Password</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><a href="#"><i class="mdi mdi-eye-off"></i></a></td>
                                            <td>Active / Inactive</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 74%;"  >{{$admins->onEachSide(5)->links()}}</div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}} <a href="/" target="_blank">Sithu</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Learn Laravel With <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>



@endsection
