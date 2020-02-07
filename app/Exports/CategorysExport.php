<?php

namespace App\Exports;

use App\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategorysExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all('category_name');
    }

    public function headings(): array{
        return[
            'Category Name',
        ];
    }
}
