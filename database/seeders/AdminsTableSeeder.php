<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            [
                "id" => 3, 
                "name" => "Ofe", 
                "type" => "admin", 
                "vendor_id" => 0, 
                "mobile" => "+2349033688922", 
                "email" => "ofe@admin.com", 
                "password" => "",
                "image" => "",
                "status" => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
