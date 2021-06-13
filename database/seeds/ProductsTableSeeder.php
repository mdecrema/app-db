<?php

use Illuminate\Database\Seeder;
use App\Product;
use Faker\Generator as Faker;


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 40; $i++) {
            $newProduct = new Product;

            $newProduct->nome=$faker->text(30);
            $newProduct->photo1=$faker->imageUrl($width = 550, $height = 300);
            $newProduct->photo2=$faker->imageUrl($width = 550, $height = 300);
            $newProduct->photo3=$faker->imageUrl($width = 550, $height = 300);
            $newProduct->photo4=$faker->imageUrl($width = 550, $height = 300);
            $newProduct->photo5=$faker->imageUrl($width = 550, $height = 300);
            $newProduct->categoria=$faker->text(10);
            $newProduct->genere=$faker->title($gender = 'male'|'female');
            $newProduct->taglia=$faker->randomLetter();
            $newProduct->description=$faker->text($maxNbChars = 300);
            $newProduct->colore=$faker->colorName();
            $newProduct->brand=$faker->word();
            $newProduct->amount=$faker->randomFloat($nbMaxDecimals = 2, $min = NULL, $max = 1000);
            $newProduct->availability=$faker->boolean();
            $newProduct->valutazione=$faker->randomDigit();

            $newProduct->save();
        }
    }
}
