@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">customers List<br><br>
                            <a href="{{route('exportcustomerASExcel')}}" target="_blank"><button class="btn btn-success">Export Data as Excel</button></a>
                            <a href="{{route('exportcustomerAsCSV')}}" target="_blank"><button class="btn btn-primary">Export Data as CSV</button></a>
                            <a href="{{route('exportcustomerAsPDF')}}" target="_blank"><button class="btn btn-danger">Export Data as PDF</button></a>
                        </p>

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customers Name</th>
                                            <th>Email</th>
                                            <th>Purchased Products</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 74%;"  >{{$customers->onEachSide(5)->links()}}</div>
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
