<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginUser(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
//            echo  "<pre>"; print_r($data); die;

            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:250|exists:users',
                'password' => 'required|min:6'
            ],
            [
                'email.exists' => 'Email does not exists'
            ]);

            if ($validator->passes()) {

                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {

                    // Remeber User Email and Password
                    if (!empty($data['remember-me'])) {
                        setcookie("user-email",$data['email'],time()+3600);
                        setcookie("user-password",$data['password'],time()+3600);
                    } else {
                        setcookie("user-email");
                        setcookie("user-password");
                    }

                    if (Auth::user()->status==0) {
                        Auth::logout();
                        return response()->json([
                            'status' => false,
                            'type' => 'inactive',
                            'message' => 'Your account is not activated yet!'
                        ]);
                    }

                    $redirectUrl = url('cart');
                    return response()->json([
                        'status' => true,
                        'type' => 'success',
                        'redirectUrl' => $redirectUrl,
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'type' => 'incorrect',
                        'message' => 'You have entered wrong email or password!',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'errors' => $validator->messages()
                ]);
            }
        }
        return view('front.users.login');
    }

    public function registerUser(Request $request) {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(),[
               'name' => 'required|string|max:150',
               'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|string|min:6'
            ],
                [
                'email.email' => 'Please enter the valid Email'
            ]);

            if ($validator->passes()) {
                $data = $request->all();
//            echo "<pre>"; print_r($data); die;

                // Register the User
                $user = new User;
                $user->name = $data['name'];
                $user->mobile = $data['mobile'];
                $user->email = $data['email'];
                $user->password = bcrypt($data['password']);
                $user->status = 0;
                $user->save();

                // Activate the user only when user confirms his email account

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = [
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'code'=>base64_encode($data['email'])
                ];
                Mail::send('emails.confirmation',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Confirm your DTSneaker.in Account');
                });

                // Redirect back user with a success message
                $redirectURL = url('user/register');
                return response()->json([
                        'status' => true,
                        'type' => 'success',
                        'redirectUrl' => $redirectURL,
                        'message' => 'Please confirm your email to activate your Account'
                ]);

//                if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])) {
//
//                    // Send Register Email
//                    $email = $data['email'];
//                    $messageData = [
//                        'name'=>$data['name'],
//                        'mobile'=>$data['mobile'],
//                        'email'=>$data['email']
//                    ];
//                    Mail::send('emails.register',$messageData,function ($message) use($email){
//                       $message->to($email)->subject('Welcome to DTSneaker.in');
//                    });
//
//
//                    $redirectUrl = url('cart');
//                    return response()->json([
//                        'status' => true,
//                        'type' => 'success',
//                        'redirectUrl' => $redirectUrl,
//                    ]);
//                }

            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'validation',
                    'errors' => $validator->messages()
                ]);
            }
        }
        return view('front.users.register');
    }

    public function confirmAccount($code) {
        $email = base64_decode($code);
        $userCount = User::where('email',$email)->count();
        if ($userCount>0) {
            $userDetails = User::where('email',$email)->first();
            if ($userDetails->status == 1) {
                // Redirect the User to login page with the error message
                return redirect('user/login')->with('error_message','Your account is already activated. You can login now.');
            } else {
                User::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = [
                    'name'=>$userDetails->name,
                    'mobile'=>$userDetails->mobile,
                    'email'=>$email,
                ];
                Mail::send('emails.register',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Welcome to DTSneaker.in');
                });

//                // Update User Cart with user id
//                if (!empty(Session::get('session_id'))) {
//                    $user_id = Auth::user()->id;
//                    $session_id = Session::get('session_id');
//                    Cart::where('session_id',$session_id)->update(['user_id',$user_id]);
//                }

                // Redirect the user to the Login Page with success message
                return redirect('user/login')->with('success_message','Your account is activated. You can login now.');
            }
        } else {
            abort(404);
        }
    }

    public function forgotPassword(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'email' => 'required|email|max:250|exists:users',
            ],
            [
                'email.exists' => 'Email does not exists'
            ]);
            if ($validator->passes()) {

                // Send Email to User with Reset Password link
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.reset_password',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Reset your Password - DTSneaker.in');
                });

                // Show success message
                return response()->json([
                    'type' => 'success',
                    'message' => 'Reset Password link sent to your registered email.'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'errors' => $validator->messages()
                ]);
            }
        } else {
            return view('front.users.forgot_password');
        }
    }

    public function resetPassword(Request $request, $code=null) {
        if ($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            $email = base64_decode($data['code']);
            $userCount = User::where('email',$email)->count();
            if ($userCount>0) {
                // Update New Password
                User::where('email',$email)->update(['password'=>bcrypt($data['password'])]);

                // Send Confirmation Email to User
                $messageData = ['email'=>$email];
                Mail::send('emails.new_password_confirmation',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Password Updated - DTSneaker.in');
                });

                // Show success message
                return response()->json([
                    'type' => 'success',
                    'message' => 'Password reset for your account. You can login now.'
                ]);
            } else {
                abort(404);
            }
        } else {
            return view('front.users.reset_password')->with(compact('code'));
        }
    }

    public function logoutUser(Request $request) {
        // Nếu người dùng đã đăng nhập, xóa giỏ hàng của họ
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            Cart::where('user_id', $user_id)->delete();
        } else {
            // Nếu người dùng chưa đăng nhập, xóa giỏ hàng dựa trên session_id
            $session_id = Session::get('session_id');
            if ($session_id) {
                Cart::where('session_id', $session_id)->delete();
            }
        }
        Auth::logout();
        // Vô hiệu hóa session hiện tại
        $request->session()->invalidate();

        // Tái tạo token CSRF để đảm bảo bảo mật
        $request->session()->regenerateToken();

        return redirect('user/login');
    }

    public function account(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;
            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:150',
                'mobile' => 'required|numeric|digits:10',
                'email' => 'required|email|max:250|',
                'address' => 'required|string|max:150',
                'provinces' => 'required|string|max:150',
                'districts' => 'required|string|max:150',
                'wards' => 'required|string|max:150',
            ]);
            if ($validator->passes()) {
                // Update User Details
                User::where('id',Auth::user()->id)->update([
                   'name' => $data['name'],
                   'address' => $data['address'],
                   'mobile' => $data['mobile'],
                   'email' => $data['email'],
                    'provinces' => $data['provinces'],
                    'districts' => $data['districts'],
                    'wards' => $data['wards'],
                ]);
                return response()->json([
                    'status' => true,
                    'type' => 'success',
                    'message' => 'User Details Successfully updated!'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'validation',
                    'errors' => $validator->messages()
                ]);
            }
        } else {
            $provinces = Province::get()->toArray();
            $user = Auth::user();
            return view('front.users.account')->with(compact('provinces','user'));
        }
    }
    public function getDistricts(Request $request) {
        if(!empty($request->province_code)) {
            $districts = District::where('province_code',$request->province_code)
                ->orderBy('name','ASC')
                ->get();
            return response()->json([
                'status' => true,
                'districts' => $districts
            ]);
        } else {
            return response()->json([
                'status' => true,
                'districts' => []
            ]);
        }
    }

    public function getWards(Request $request) {
        if(!empty($request->district_code)) {
            $wards = Ward::where('district_code',$request->district_code)
                ->orderBy('name','ASC')
                ->get();
            return response()->json([
                'status' => true,
                'wards' => $wards
            ]);
        } else {
            return response()->json([
                'status' => true,
                'wards' => []
            ]);
        }
    }

    public function updatePassword(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();

            $validator = Validator::make($request->all(),[
                'current_password' => 'required|min:6',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required|same:new_password',
            ]);
            if ($validator->passes()) {
                // Enter by the User in Updated Password Form
                $current_password = $data['current_password'];
                // Get Current Password from users table
                $checkPassword = User::where('id',Auth::user()->id)->first();
                // Compare Current Password
                if (Hash::check($current_password,$checkPassword->password)) {
                    // Update User Current Password
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']);
                    $user->save();
                    // Redirect back user with success
                    return response()->json([
                       'type' => 'success',
                       'message' => 'Your password is Successfully Updated!'
                    ]);
                } else {
                    // Redirect back user with error message
                    return response()->json([
                       'type' => 'incorrect',
                       'message' => 'Your current password is incorrect!',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'validation',
                    'errors' => $validator->messages()
                ]);
            }
        } else {
            return view('front.users.update_password');
        }
    }
}
