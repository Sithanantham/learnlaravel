<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('role', '!=', 'Admin')->orWhereNull('role')->select('name', 'email', 'created_at')->get();
    }

    public function headings(): array{
        return[
            'Name',
            'Email',
            'Customer From',
        ];
    }
}
