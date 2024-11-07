<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminsRole;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;



class AdminController extends Controller
{
    public function dashboard() {
        Session::put('page','dashboard');
        $categoriesCount = Category::get()->count();
        $productsCount = Product::get()->count();
        $brandsCount = Brand::get()->count();
        $usersCount = User::get()->count();
        return view('admin.dashboard')->with(compact('categoriesCount','productsCount','brandsCount','usersCount'));
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];

            $customMessages = [
                'email.required' => "Email is required",
                'email.email' => "Valid Email is required",
                'password.required' => "Password is required",
            ];

            $this->validate($request,$rules,$customMessages);

            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){

                // Remember Admin Email & Password with cookies
                if(isset($data['remember']) && !empty($data['remember'])) {
                    setcookie("email",$data['email'],time()+3600);
                    setcookie("password",$data['password'],time()+3600);
                } else {
                    setcookie("email", "");
                    setcookie("password", "");
                }

                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password!");
            }
        }
        return view('admin.login');
    }


    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updatePassword(Request $request) {
        Session::put('page','update-password');
        if($request->isMethod('post')) {
            $data = $request->all();
            // Check if current password is correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
                // Check if new password and confirm password are mathching
                if($data['new_pwd'] == $data['confirm_pwd']) {
                    // Update new password
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    return redirect()->back()->with('success_message','Password has been updated Successfully!');
                } else {
                    return redirect()->back()->with('error_message','New Password and Retype Password not match!');
                }
            } else {
                return redirect()->back()->with('error_message','Your current password is Incorrect!');
            }
        }
        return view('admin.update_password');
    }

    public function checkCurrentPassword(Request $request) {
        $data = $request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateDetails(Request $request) {
        Session::put('page','update-details');
        if($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die();
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
                'admin_mobile' => 'required|numeric|digits:10',
                'admin_image' => 'image'
            ];

            $customMessages = [
                'admin_name.required' => "Name is required",
                'admin_name.regex' => "Valid Name is required",
                'admin_name.max' => "Valid Name is required",
                'admin_mobile.required' => "Password is required",
                'admin_mobile.numeric' => "Valid Mobile is required",
                'admin_mobile.digits' => "Valid Mobile is required",
                'admin_image' => "Valid Image is required",
            ];

            $this->validate($request,$rules,$customMessages);

            // Upload Admin Image
            if($request->hasFile('admin_image')) {
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid()) {
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;

                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($image_tmp);
                    // save modified image in new format
                    $image->toPng()->save($image_path);

                }
            }elseif (!empty($data['current_image'])) {
                $imageName = $data['current_image'];
            } else {
                $imageName = "";
            }

            // Update Admin Details
            Admin::where('email',Auth::guard('admin')->user()->email)
                ->update([
                    'name'=>$data['admin_name'],
                    'mobile'=>$data['admin_mobile'],
                    'image'=>$imageName
                ]);
            return redirect()->back()->with('success_message','Admin Details has been updated Successfully!');
        }
        return view('admin.update_details');
    }

    public function subadmins() {
        Session::put('page','subadmins');
        $subadmins = Admin::where('type','subadmin')->get();
        return view('admin.subadmins.subadmins')->with(compact('subadmins'));
    }

    public function updateSubadminStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();

            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            Admin::where('id',$data['subadmin_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'subadmin_id'=>$data['subadmin_id']]);
        }
    }

    public function addEditSubadmin(Request $request, $id=null)
    {
        if($id =="") {
            $title = "Add Subadmin";
            $subadminData = new Admin();
            $message = "Subadmin added successfully";
        } else {
            $title = "Edit Subadmin";
            $subadminData = Admin::find($id);
            $message = "Subadmin updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            if($id=="") {
                $subadminCount = Admin::where('email',$data['email'])->count();
                if($subadminCount  > 0) {
                    return redirect()->back()->with('error_message','Subadmin already exists!');
                }
            }

            // Subadmin Validations
            $rules = [
                'name' => 'required',
                'mobile' => 'required|numeric',
                'image' => 'image'
            ];

            $customMessages = [
                'name.required' => 'Name is required',
                'mobile.required' => 'Mobile is required',
                'mobile.numeric' => 'Valid Mobile is required',
                'image.image' => 'Valid Image is required',
            ];

            $this->validate($request, $rules, $customMessages);

            // Upload Admin Image
            if($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()) {
                    // Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate New Image Name
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;

                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($image_tmp);
                    // save modified image in new format
                    $image->toPng()->save($image_path);

                }
            }elseif (!empty($data['current_image'])) {
                $imageName = $data['current_image'];
            } else {
                $imageName = "";
            }

            $subadminData->image = $imageName;
            $subadminData->name = $data['name'];
            $subadminData->mobile = $data['mobile'];
            if($id=="") {
                $subadminData->email = $data['email'];
                $subadminData->type = 'subadmin';
            }
            if($data['password'] != "") {
                $subadminData->password = bcrypt($data['password']);
            }
            $subadminData->save();

            return redirect('admin/subadmins')->with('success_message',$message);
        }

        return view('admin.subadmins.add_edit_subadmin')->with(compact('title','subadminData'));
    }

    public function deleteSubadmin($id)
    {
        // Delete Subadmin
        Admin::where('id',$id)->delete();
        return redirect()->back()->with('success_message','Subadmin deleted successfully');
    }

    public function updateRole($id,Request $request) {
        if($request->isMethod('post')) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            // Delete all earlier roles for Subadmin
            AdminsRole::where('subadmin_id',$id)->delete();


            // Add new roles for Subadmin Dynamically
            foreach ($data as $key => $value) {
                if(isset($value['view'])) {
                    $view = $value['view'];
                } else {
                    $view = 0;
                }
                if(isset($value['edit'])) {
                    $edit = $value['edit'];
                } else {
                    $edit = 0;
                }
                if(isset($value['full'])) {
                    $full = $value['full'];
                } else {
                    $full = 0;
                }

                AdminsRole::where('subadmin_id',$id)->insert(['subadmin_id'=>$id,'module'=>$key,'view_access'=>$view,'edit_access'=>$edit,'full_access'=>$full]);
            }

            // Đây kh lưu được tất cả các quyền khi cho phép,sửa câu ở trên
//            $role = new AdminsRole();
//            $role->subadmin_id = $id;
//            $role->module = $key;
//            $role->view_access = $view;
//            $role->edit_access = $edit;
//            $role->full_access = $full;
//            $role->save();

            $message = "Subadmin Roles updated successfully!";
            return redirect()->back()->with('success_message',$message);
        }
        $subadminRoles = AdminsRole::where('subadmin_id',$id)->get()->toArray();
        $subadminDetails = Admin::where('id',$id)->first()->toArray();
        $title = "Update ".$subadminDetails['name']." Subadmin Roles/Permission";

//        dd($subadminRoles);

        return view('admin.subadmins.update_roles')->with(compact('title','id','subadminRoles'));
    }

}
