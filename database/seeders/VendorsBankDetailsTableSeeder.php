<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetail;

class VendorsBankDetailsTableSeeder extends Seeder
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
                "account_holder_name" => "Chime", 
                "bank_name" => "GTBank", 
                "account_number" => "0613743801", 
                "bank_bin_code" => "061374",
            ]
        ];
        VendorsBankDetail::insert($vendorRecords);
    }
}
