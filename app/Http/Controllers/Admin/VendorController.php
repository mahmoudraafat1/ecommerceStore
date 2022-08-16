<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\Models\Admin;
use Intervention\Image\Facades\Image;

class VendorController extends Controller
{
    function updateVendorDetails($slug){
        if ($slug=='personal'){

        }
        else if($slug=='shop'){

        }
        else if($slug=='payment'){

        }
        return view('admin/settings/update-vendor-details')->with(compact('slug'));
    }
}
