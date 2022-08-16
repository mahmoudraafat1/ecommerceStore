<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBussinessDetails;

class VendorsBussinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $VendorRecords = [
            ['id'=> 1, 'vendor_id'=>1, 'shop_name'=>'nabilEcommerce',
             'shop_city'=>'cairo', 'shop_state'=>'cairo' , 'shop_country'=>'Egypt',
            'shop_website'=>'www.example.com','shop_license'=>'license123','shop_mobile'=>'0123456789']
        ];
        VendorsBussinessDetails::insert($VendorRecords);
        
    }
}
