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
        return Product::all();
    }

    public function headings(): array{
        return[
            '#',
            'Product Name',
            'Brand Name',
            'Price',
            'Discount %',
            'Discount Price',
            'Product Image',
            'Product Status',
            'Created At',
            'Updated At',
            'Category Id',
            'Product Video',
            'Product Audio',
        ];
    }
}
