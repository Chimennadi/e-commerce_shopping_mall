<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannerRecords = [
            ["id" => 1, "image" => "banner-1.png", "link" => "spring-collection", "title" => "Spring Collection", "alt" => "Spring Collection", "status" => 1],
            ["id" => 2, "image" => "banner-2.png", "link" => "tops", "title" => "Tops", "alt" => "Tops", "status" => 1],
        ];
        Banner::insert($bannerRecords);
    }
}
