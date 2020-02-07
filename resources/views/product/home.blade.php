@extends('layouts.productLayout')

@section('content')

          <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Recent Purchases <br><br>
                        <a href="{{route('exportExcel')}}" target="_blank"><button class="btn btn-success">Export Data as Excel</button></a>
                        <a href="{{route('exportCSV')}}" target="_blank"><button class="btn btn-primary">Export Data as CSV</button></a>
                        <a href="{{route('exportPDF')}}" target="_blank"><button class="btn btn-danger">Export Data as PDF</button></a>
                    </p>
                  <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Brand Name</th>
                                            <th>Price</th>
                                            <th>Discount (%)</th>
                                            <th>Discounted Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><img src="{{URL::asset('/productImages/'.$product->product_image)}}" alt=""></td>
                                            <td>{{ ucfirst($product->product_name) }}</td>
                                            <td>{{ ucfirst($product->category_name['category_name']) }}</td>
                                            <td>{{ ucfirst($product->product_brand_name) }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_discount }}</td>
                                            <td>{{ $product->product_discount_price }}</td>
                                            @if($product->product_status == 'In Stock')
                                                <td><label class="badge badge-success">{{ $product->product_status }}</label></td>
                                            @else
                                                <td><label class="badge badge-danger">{{ $product->product_status }}</label></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                            </div>
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


