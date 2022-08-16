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
            ['id' => 2 , 'name' => 'testvendor' , 'type' => 'vendor' , 'Vendor_id' => 1 , 'mobile_number' => '011111111' , 'email' => 'vendor@vendor.com' , 
            'password' =>'$2y$10$.W4yxqgo5VNa4EZJqMKSnOyDTa5XE5BfSZizfGGv6wzZjF1ZvTLbu' , 'image' => '' ,'status' => 0],
        ];
        Admin::insert($adminRecords);
    }
}
