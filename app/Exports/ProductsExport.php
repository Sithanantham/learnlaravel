<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all('product_name', 'product_brand_name', 'product_price', 'product_discount', 'product_discount_price', 'product_status');
    }

    public function headings(): array{
        return[
            'Product Name',
            'Brand Name',
            'Price',
            'Discount %',
            'Discounted Price',
            'Product Status',
        ];
    }
}
