@extends('layouts.productLayout')

@section('content')

        <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Add Category
                        </p>
                        <form id="myform" class="forms-sample" method="post" action="/admin/save-category" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row">
                                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name" required>
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mr-2 pull-right">Save Category</button>
                                <button type="reset" class="btn btn-danger mr-2">Reset</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Category's List
                        </p>
                        <div class="table-responsive">
                                    <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach($category as $categorys)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{ ucfirst($categorys->category_name) }}</td>
                                            <td style="width:120px">
                                            <form action="/admin/{{ $categorys->id }}/delete-category" method="post">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                <a href="/admin/{{ $categorys->id }}/edit-category"><label class="badge badge-primary"><i class="mdi mdi-lead-pencil" aria-hidden="true"></i></label></a> &nbsp;
                                                    <button type="submit" class="badge badge-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i class="mdi mdi-delete" aria-hidden="true"></i></button>
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
