@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Edit Product
                            <a href="/admin/view-product" class="float-right">View Product</a>
                        </p>
                        <form class="forms-sample" method="post" action="/admin/{{$edit_products->id}}/update-product" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" value="{{$edit_products->product_name}}" required>
                                </div>
                                <label for="product_name" class="col-sm-2 col-form-label">Product Category</label>
                                <div class="col-sm-4">
                                <select name="category_id" id="category_id" class="form-control" required>
                                <option value="{{($edit_products->category_id)}}">
                                    @foreach($category as $categorys)
                                        @if($categorys->id == $edit_products->category_id)
                                                {{$categorys->category_name}}
                                        @endif
                                    @endforeach
                                </option>
                                    @foreach($category as $categorys)
                                        <option value="{{($categorys->id)}}">{{$categorys->category_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_brand_name" class="col-sm-2 col-form-label">Product Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_brand_name" class="form-control" id="product_brand_name" placeholder="Product Brand Name" value="{{$edit_products->product_brand_name}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="product_price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Product Price" value="{{$edit_products->product_price}}" required>
                                </div>
                                <label for="product_discount" class="col-sm-1 col-form-label">Discount (%)</label>
                                <div class="col-sm-3">
                                    <input type="text" name="product_discount" class="form-control" id="product_discount" placeholder="Product Discount in %" value="{{$edit_products->product_discount}}" maxlength="2" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="product_discount_price" class="form-control" id="product_discount_price" placeholder="Product Discount Price" value="{{$edit_products->product_discount_price}}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-5">
                                    <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Product Image" value="{{URL::asset('/productImages/'.$edit_products->product_image)}}">
                                </div>
                                <div class="col-sm-5">
                                    <img src="{{URL::asset('/productImages/'.$edit_products->product_image)}}" alt="" height="80px" width="80px">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="product_status" id="product_status" value="In Stock" {{($edit_products->product_status == 'In Stock')? "checked" : ""}} > In Stock &nbsp;
                                    <input type="radio" name="product_status" id="product_status" value="Out of Stock" {{($edit_products->product_status == 'Out of Stock')? "checked" : ""}}> Out of Stock
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mr-2 pull-right">Save Product</button>
                                <button type="reset" class="btn btn-danger mr-2">Reset</button>
                            </div>

                        </form>
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

<script>

    $(document).on("change keyup blur", "#product_discount", function() {
        var product_price = $('#product_price').val();
        var product_discount  = $('#product_discount').val();
        var dec = (product_discount / 100).toFixed(2);
                var mult = product_price * dec;
                var discont = product_price - mult;
        $('#product_discount_price').val(discont);
    });

</script>

@endsection
