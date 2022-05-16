<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'nome' => $row['nome'],
            'photo1' => $row['photo1'],
            'photo2' => $row['photo2'],
            'photo3' => $row['photo3'],
            'photo4' => $row['photo4'],
            'photo5' => $row['photo5'],
            'categoria' => $row['categoria'],
            'genere' => $row['genere'],
            'description' => $row['description'],
            'colore' => $row['colore'],
            'brand' => $row['brand'],
            'amount' => $row['amount'],
            'availability' => $row['availability'],    
            'valutazione'=> $row['valutazione'],
            'appView' => $row['view']
        ]);
    }
}
