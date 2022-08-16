<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorsBankDetails;

class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $VendorRecord = ['id'=>1 , 'vendor_id'=>1 , 'account_holder_name'=>'zeyad hassan' , 'bank_name'=>'CIB' , 
        'expiration_data'=>'8/26'];
        VendorsBankDetails::insert($VendorRecord);
    }
}
