@extends('layouts.homeLayout')

@section('content')

        <div class="row items" id="myContent body">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="" id="myTable">
                    @foreach($products as $product)
        <div class="">
            <div class="card">
                <div class="card-body">
                        <div class="col-sm-4" style="float:left;">
                            <img src="{{URL::asset('/productImages/'.$product->product_image)}}" alt="" height="110px" width="110px">
                        </div>
                        <div class="col-sm-6" style="margin-left:32%">
                    <ul class="list-ticked">
                    <table id="">
                        <tr>
                            <td colspan="2" style="font-size:18px">{{ucfirst($product->product_brand_name)}} {{ucfirst($product->product_name)}}</td>
                        </tr>
                        <tr>
                            <td><li>M.R.P.</li></td>
                            <td> &nbsp; : &nbsp; {{$product->product_price}}</td>
                        </tr>
                        <tr>
                            <td><li>Price</li></td>
                            <td> &nbsp; : &nbsp; {{$product->product_discount_price}}</td>
                        </tr>
                        <tr>
                            <td><li>Save</li></td>
                            <td> &nbsp; : &nbsp;
                                @php $saving_amount = $product->product_price - $product->product_discount_price @endphp
                             {{$saving_amount}} <small>({{$product->product_discount}} %)</small></td>
                        </tr>
                    </table>
                    </ul>
                    @if($product->product_status == 'In Stock')
                                <li class="badge badge-success">{{$product->product_status}}</li>
                                <button class="btn btn-secondary btn-rounded btn-fw btn-sm">Buy Now</button>
                            @else
                                <li class="badge badge-danger">{{$product->product_status}}</li>
                            @endif

                    </div>
                </div>
            </div>
        </div>
        @endforeach
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
