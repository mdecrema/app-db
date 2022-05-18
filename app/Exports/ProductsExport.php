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

    public function headings(): array
    {
        return [
            'nome', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'categoria', 'genere', 
            'description', 'colore', 'sizes', 'counterSizeType', 'brand', 'amount', 'availability', 'valutazione', 'appView', 'created_at', 'updated_at'
        ];
    }
}
