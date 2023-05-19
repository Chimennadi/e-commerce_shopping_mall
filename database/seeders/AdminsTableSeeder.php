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
                "id" => 2, 
                "name" => "Nnadi", 
                "type" => "vendor", 
                "vendor_id" => 1, 
                "mobile" => "+2347032281281", 
                "email" => "nnadi@admin.com", 
                "password" => "$2a$12$9r8Uw1J7H4JD0qxV8aprAO1nsJCzNu3oqgx9qXr2WpXDZdlEMfKeq",
                "image" => "",
                "status" => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
