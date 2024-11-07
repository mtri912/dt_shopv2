<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsRole;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function users() {
        Session::put('page','users');
        $users = User::get();

        // Thêm thông tin tỉnh, huyện, xã vào mỗi user
        foreach ($users as $user) {
            $provinces = Province::where('code', $user->provinces)->first();
            $districts = District::where('code', $user->districts)->first();
            $wards = Ward::where('code', $user->wards)->first();

            $user->province_name = $provinces ? $provinces->full_name : 'N/A';
            $user->district_name = $districts ? $districts->full_name : 'N/A';
            $user->ward_name = $wards ? $wards->full_name : 'N/A';
        }

        $users = $users->toArray();

        // Set Admin/Subadmins Permissions for Users
        $usersModuleCount = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->count();
        $usersModule = array();
        if(Auth::guard('admin')->user()->type=="admin") {
            $usersModule['view_access'] = 1;
            $usersModule['edit_access'] = 1;
            $usersModule['full_access'] = 1;
        } elseif ($usersModuleCount == 0) {
            $message = "This feature is restricted for you!";
            return redirect('admin/dashboard')->with('error_message',$message);
        } else {
            $usersModule = AdminsRole::where(['subadmin_id'=>Auth::guard('admin')->user()->id,'module'=>'users'])->first()->toArray();

        }
        return view('admin.users.users')->with(compact('users','usersModule'));
    }

    public function updateUserStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }
            User::where('id', $data['user_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'user_id' => $data['user_id']]);
        }
    }
}
