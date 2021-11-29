<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Hash;
use Auth;
use Str;
use DB;
use Carbon\Carbon;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        return view('users.login_layouts.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'c_password' => 'required_with:password|same:password|min:6',
        ]);
        
        $user = new User;
        $user["name"] = $request->name;
        $user["email"] = $request->email;
        $user["password"] = Hash::make($request->password);
        if($user->save()){
            return redirect()->route('register')->with("success", "You Have Successfully Registered");
        }
        return redirect()->route('register')
                ->with("error", "Your registration was not successful please try again");
        
    }

    public function login(Request $request){
        $redirect_to = "dashboard";
        if ($request->has('post')) {
            $redirect_to = $request->input('post');
        }
        return view('users.login_layouts.login', ['redirect_to' => $redirect_to]);
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required', 
        ]);
        
        $user = $request->all();
        if (Auth::attempt(['email' => $user['email'], 'password' => $user['password']])) {
            if ($request->input('redirect_to') != "dashboard") {
                return redirect()->route('postDetails', $request->input('redirect_to'));
            }
            return redirect()->route('user.dashboard');
        } else {
            return redirect()->route('login')
                    ->with("error", "Please Enter Valid Email or Password");
        }
    }

    public function forgotPassword(){
        return view('users.login_layouts.forgot_password');
    }

    public function resetLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        /* Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        }); */
        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function resetPassword($token){
        return view('users.login_layouts.reset_password', ['token' => $token]);
    }

    public function resetPasswordToken(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
       
        $token = DB::table('password_resets')->where([
                            'email' => $request->email, 
                            'token' => $request->token
                ])->first();
        if(!$token){
            return back()->withInput()->with('error', 'Invalid token!');
        }             
        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect()->route('login')->with('message', 'Your password has been changed!');
    }

    public function dashboard(){
        return view('users.dashboard.dashboard');  
    }

    public function editProfile(){
        $user = Auth::user(); 
        return view('users.dashboard.pages.edit_user_profile')->with(compact('user'));  

    }
    public function updatePeofile(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'email' => 'required|max:255|unique:users,email,'.Auth::user()->id
        ]);
         
        User::where('id',$request->id) 
            ->update(['name'=> $request->name, 'email'=> $request->email]);
        return redirect()->route('user.editProfile')->with("success", "Your Profile have been updated successfully");

       
    }
    public function changePassword()
    {
        $user = Auth::user(); 
        return view('users.dashboard.pages.change_password')->with(compact('user'));  

    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'c_password' => 'required_with:new_password|same:new_password|min:6',
        ]);
        
        $user = Auth::user();
        if (\Hash::check( $request->old_password , $user['password'] )){
            $newpassword = bcrypt( $request->new_password); 
            $result = User::where('id', $user['id'])
                ->update(['password'=>$newpassword]);
            return redirect()->route('use.changePassword')->with("success", "Your Password have been updated successfully");  
            }
            return redirect()->route('user.changePassword')->with("error", "Your old password does not match");

        
    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}
