<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name_produit'=>'Aitiu',
            'prix'=> 50,
            'detail' =>'tres boon je ',
            'image' => '',
            'category_id'=> 2,
        ]);
        Product::create([
            'name_produit'=>'goto',
            'prix'=> 50,
            'detail' =>'tres boon',
            'image' => '',
            'category_id'=> 1,
        ]);
        Product::create([
            'name_produit'=>'Aib',
            'prix'=> 500,
            'detail' =>'tres coon',
            'image' => '',
            'category_id'=> 3,
        ]);
        Product::create([
            'name_produit'=>'At',
            'prix'=> 525,
            'detail' =>'tres boon',
            'image' => '',
            'category_id'=> 2,
        ]);
    }
}
