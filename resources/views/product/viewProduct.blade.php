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
                                    <table id="FlagsExport" class="table table-hover">
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

<!--Datatable-->
<script type="text/javascript" src="jquery-1.12.0.min.js"></script>

 <script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/tabletools/2.2.2/swf/copy_csv_xls_pdf.swf"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
 <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
 <link type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" rel="stylesheet">
<link type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css" rel="stylesheet">
 <script type="text/javascript">
     $(document).ready(function() {
         $('#FlagsExport').DataTable({
             "pageLength": 50,
             dom: 'Bfrtip',
             buttons: ['copy','csv','excel','pdf','print']
         });
     });
 </script>
</div>



@endsection
