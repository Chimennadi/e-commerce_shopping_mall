<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBusinessDetail;

class VendorsBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorRecords = [
            [
                "id" => 1, 
                "vendor_id" => 1, 
                "shop_name" => "Chime Electronics Stores", 
                "shop_address" => "1234-SCF", 
                "shop_city" => "Ikeja", 
                "shop_state" => "Lagos State",
                "shop_country" => "Nigeria",
                "shop_pincode" => "110003",
                "shop_mobile" => "+2347060829085",
                "shop_website" => "nnadi.com",
                "shop_email" => "nnadi@admin.com",
                "address_proof" => "Passport",
                "address_proof_image" => "test.jpg",
                "business_license_number" => "123450000",
                "nin_number" => "324500000",
                "pan_number" => "322000000"
            ]
        ];
        VendorsBusinessDetail::insert($vendorRecords);
    }
}
