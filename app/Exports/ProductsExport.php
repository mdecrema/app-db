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
            'id', 'nome', 'photo1', 'photo2', 'photo3', 'photo4', 'photo5', 'brand', 'categoria', 'genere', 
            'description', 'colore', 'sizes', 'counterSizeType', 'amount', 'availability', 'valutazione', 'appView', 'created_at', 'updated_at'
        ];
    }
}
