<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\Models\Admin;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard(){
        // sending the admin data who logged in to the dashboard page and selecting only his name from the dashboard.php page
        $adminName = Admin::where('email' , Auth::guard('admin')->user()->email)->first()->toArray();
        // this return the update password page
        return view('admin\dashboard')->with(compact('adminName'));
    }
    // this function is managing the post request that will be send after the admin submit the update form
    public function updateAdminPassword(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            if(Hash::check($data['Current_Password'], Auth::guard('admin')->user()->password)){
                // Now we will check if the new password is matching with Confirm new password
                if($data['New_Password']==$data['Confirm_New_Password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' => hash::make($data['New_Password'])]);
                    return redirect()->back()->with('Success_message' , 'Your Current Password has been updated Successfully!');
                }
                else{
                    return redirect()->back()->with('error_message' , 'Your New Password and Confrim password are not matching!');
                }
            }
            else{
                return redirect()->back()->with('error_message' , 'Your Current Password is Incorrect!');
            }
        }

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

    public function updateAdminDetails(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                // check this regex later on and apply it for each input field 
                'admin_name' => 'required||regex:/^[\pL\s\-]+$/u',
                'admin_phone_number' =>'required|numeric',
            ];

            $customMessage = [
                'admin_name.required' => 'Name is required',
                'admin_name.regex' => 'Valid Name is required',
                'admin_mobile.required' => 'mobile number is required',
                'admin_mobile.numeric' =>'valid mobile number is required',
            ];
            $this->validate($request , $rules , $customMessage);
            // uploading admin photo
            if($request->hasFile('admin_image')){
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()){
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    srand();
                    $imageName =rand().'.'.$extension;
                    $imagePath = 'admin/images/photos/'.$imageName;
                    // Upload the Image
                    Image::make($image_tmp)->save($imagePath);
                }
            }else if(!empty($data['current_admin_image'])){
                $imageName = $data['current_admin_image'];
            }else{
                $imageName = "";
            }

            // passing the new admin details to the database
            Admin::where('id' , Auth::guard('admin')->user()->id)->update(['name' =>$data['admin_name'],
             'mobile_number'=>$data['admin_phone_number'],'image'=>$imageName]);

            return redirect()->back()->with('Success_message' , 'Admin Details updated successfully');
        }
        return view('admin/settings/update-admin-details');
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
