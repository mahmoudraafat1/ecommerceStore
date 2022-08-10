<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' => 1 , 'name' => 'Super Admin' , 'type' => 'superadmin' , 'Vendor_id' => 0 , 'mobile number' => '010111111' , 'email' => 'admin@admin.com' , 
            'password' =>'$2y$10$.W4yxqgo5VNa4EZJqMKSnOyDTa5XE5BfSZizfGGv6wzZjF1ZvTLbu' , 'image' => '' ,'status' => 1],
        ];
        Admin::insert($adminRecords);
    }
}
