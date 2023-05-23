<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductsAttribute;

class ProductsAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productAttributesRecords = [
            ["id" => 1, "product_id" => 2, "size" => "Small", "price" => 1000, "stock" => 10, "sku" => "RC001-S", "status" => 1],
            ["id" => 2, "product_id" => 2, "size" => "Medium", "price" => 1100, "stock" => 15, "sku" => "RC001-M", "status" => 1],
            ["id" => 3, "product_id" => 2, "size" => "Large", "price" => 1200, "stock" => 20, "sku" => "RC001-L", "status" => 1]
        ];
        ProductsAttribute::insert($productAttributesRecords);
    }
}
