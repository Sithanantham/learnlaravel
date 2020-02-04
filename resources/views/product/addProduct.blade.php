@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Add Product
                        <a href="/admin/view-product" class="float-right">View Product</a>
                        </p>
                        <form id="myform" class="forms-sample" method="post" action="/admin/save-product" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row">
                                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-4">
                                    <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" required>
                                </div>
                                <label for="product_name" class="col-sm-2 col-form-label">Product Category</label>
                                <div class="col-sm-4">
                                <select name="category_id" id="category_id" class="form-control" required>
                                    <option disabled selected>Select Category</option>
                                    @foreach($category as $categorys)
                                        <option value="{{$categorys->id}}">{{$categorys->category_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_brand_name" class="col-sm-2 col-form-label">Product Brand Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="product_brand_name" class="form-control" id="product_brand_name" placeholder="Product Brand Name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                 <label for="product_price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-3">
                                    <input type="number" name="product_price" class="form-control percentage" id="product_price" placeholder="Product Price" required>
                                </div>
                                <label for="product_discount" class="col-sm-1 col-form-label">Discount (%)</label>
                                <div class="col-sm-3">
                                    <input type="number" name="product_discount" class="form-control percentage" id="product_discount" placeholder="Product Discount in %" value="0" maxlength="2" required>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" name="product_discount_price" class="form-control percentage" id="product_discount_price" placeholder="Product Discount Price" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_image" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Product Image" accept="image/*" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_video" class="col-sm-2 col-form-label">Video</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_video" class="form-control" id="product_video" placeholder="Product video">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_audio" class="col-sm-2 col-form-label">Audio</label>
                                <div class="col-sm-10">
                                    <input type="file" name="product_audio" class="form-control" id="product_audio" placeholder="Product audio" accept="audio/*">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="product_status" id="product_status" value="In Stock" checked> In Stock &nbsp;
                                    <input type="radio" name="product_status" id="product_status" value="Out of Stock"> Out of Stock
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
