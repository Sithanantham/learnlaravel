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
            <td><img src="{{URL::asset('/productImages/'.$product->product_image)}}" alt="" height="100px" width="100px"></td>
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
        </tr>
        @endforeach
    </tbody>
</table>
