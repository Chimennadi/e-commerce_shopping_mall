<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;


class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            [
                "id" => 1, 
                "name" => "Nnadi", 
                "address" => "CP-112", 
                "city" => "Ikeja", 
                "state" => "Lagos State", 
                "country" => "Nigeria", 
                "pincode" => "112002", 
                "mobile" => "+2349033688922", 
                "email" => "nnadi@admin.com",
                "status" => 1
                ]
        ];
        Vendor::insert($vendorRecords);
    }
}
