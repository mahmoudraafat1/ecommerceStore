<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords = [
            ['id' =>1 , 'name'=>'testvendor', 'physical address' => '1 el fokhaa' , 'city' => 'cairo' , 'country'=>'Egypt' ,
            'pincode' => '12511' , 'mobile number' => '011111111' , 'email address' => 'vendor@vendor.com' , 'status'=>0 ]
        ];
        Vendor::insert($vendorRecords);
    }
}
