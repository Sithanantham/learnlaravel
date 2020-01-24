@extends('layouts.homeLayout')

@section('content')

        <div class="row items" id="myContent body">

        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mobile & Computer Items</h4>
                    <p class="card-description">
                    With flexible prices
                    </p>
                    <div class="row">
                    @foreach($mobileAndComputerItems as $items)
                        @foreach($items->products as $mobileAndComputerItem)

                        @php  //echo"<pre>"; print_r($mobileAndComputerItem); @endphp
                        <div class="col-md-4">
                        <blockquote class="blockquote">
                        <p align="center"> <a href="{{URL::asset('/productImages/'.$mobileAndComputerItem->product_image)}}" target="_blank"><img src="{{URL::asset('/productImages/'.$mobileAndComputerItem->product_image)}}" alt="" height="110px" width="110px"></a></p>

                        <div class="col-md-12" align="center"><br>
                        <ul class="list-ticked">
                        <table id="">
                            <tr>
                                <td colspan="2" style="font-size:18px" align="center">{{ucfirst($mobileAndComputerItem->product_brand_name)}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"> {{ucfirst($mobileAndComputerItem->product_name)}}</td>
                            </tr>
                            <tr>
                                <td><li>M.R.P.</li></td>
                                <td> &nbsp; : &nbsp; {{$mobileAndComputerItem->product_price}}</td>
                            </tr>
                            <tr>
                                <td><li>Price</li></td>
                                <td> &nbsp; : &nbsp; {{$mobileAndComputerItem->product_discount_price}}</td>
                            </tr>
                            <tr>
                                <td><li>Save</li></td>
                                <td> &nbsp; : &nbsp;
                                    @php $saving_amount = $mobileAndComputerItem->product_price - $mobileAndComputerItem->product_discount_price @endphp
                                {{$saving_amount}} <small>({{$mobileAndComputerItem->product_discount}} %)</small></td>
                            </tr>
                        </table>
                        </ul>
                        <a href="/{{$mobileAndComputerItem->id}}/buy-it" target="_blank"><button class="btn btn-secondary btn-rounded btn-fw btn-sm">Buy Now</button></a>
                                <a href="#"><button class="btn btn-warning btn-rounded btn-fw btn-sm">Add to Cart</button></a>
                            </div>
                        </blockquote>
                        </div>
                        @endforeach
                    @endforeach
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
