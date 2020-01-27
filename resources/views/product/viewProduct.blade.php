@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Products List
                        <a href="/admin/add-product" class="float-right">Add Product</a>
                        </p>

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Discount (%)</th>
                                            <th>Discounted Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($products as $product)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><a href="{{URL::asset('/productImages/'.$product->product_image)}}" target="_blank"><img src="{{URL::asset('/productImages/'.$product->product_image)}}" alt=""></a></td>
                                            <td>{{ ucfirst($product->product_name) }}</td>
                                            <td>{{ ucfirst($product->category_name['category_name']) }}</td>
                                            <td>{{ ucfirst($product->product_brand_name) }}</td>
                                            <td>{{ $product->product_price }}</td>
                                            <td>{{ $product->product_discount }} %</td>
                                            <td>{{ $product->product_discount_price }}</td>
                                            @if($product->product_status == 'In Stock')
                                                <td><label class="badge badge-success">{{ $product->product_status }}</label></td>
                                            @else
                                                <td><label class="badge badge-danger">{{ $product->product_status }}</label></td>
                                            @endif
                                            <td style="width:120px">
                                            <form action="/admin/{{ $product->id }}/delete-product" method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                <a href="/admin/{{ $product->id }}/edit-product"><label class="badge badge-primary"><i class="mdi mdi-lead-pencil" aria-hidden="true"></i></label></a> &nbsp;
                                                    <button type="submit" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this product?')"><i class="mdi mdi-delete" aria-hidden="true"></i></button>
                                                </form>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                            </div>
                    </div>
                </div>
            </div>
            <div style="margin-left: 74%;"  >{{$products->onEachSide(5)->links()}}</div>
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
