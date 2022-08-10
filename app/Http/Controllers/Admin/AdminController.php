<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\Models\Admin;


class AdminController extends Controller
{
    public function dashboard(){
        // sending the admin data who logged in to the dashboard page and selecting only his name from the dashboard.php page
        $adminName = Admin::where('email' , Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin\dashboard')->with(compact('adminName'));
    }

    public function updateAdminPassword(){
        // sending the admin data who logged in to the dashboard page and selecting his name , email and type from the update-admin-password.phg page
        $adminDetails = Admin::where('email' , Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin/settings/update-admin-password')->with(compact('adminDetails'));
    }

    //this function is for checking current password entered by the admin , in the update-admin-password page.
    public function checkAdminPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['Current_Password'], Auth::guard('admin')->user()->password)){
            return "true";
        }
        else{
            return "false";
        }

    }

    public function login(Request $request){


        // getting the post request info and passing it to data variable
        if($request->isMethod('post')){
            $data = $request->all();

            // Adding server side validation 

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            //adding custom messages that will show depends on the type of rule that user voilate.
            $customMessage = [
                'email.required' => 'Email address is required',
                'email.email' => 'Valid Email is required',
                'password.required' => 'password is required',
            ];

            $this->validate($request,$rules,$customMessage );

            if(Auth::guard('admin')->attempt(['email'=>$data['email'] , 'password'=>$data['password'], 'status'=>1] )){
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error_message' , 'Invadlid credentials');
            }
        }
        return view('admin\login');
    }
    public function logout(){
        // redirecting user to login page when logging out
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
