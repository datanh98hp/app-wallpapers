<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function customLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('/login')->with('status','Bạn đã đăng nhập');
        }
        ///
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('status','Đã đăng nhập');
        }
   
        return redirect("login")->with('status','Tài khoản và mật khẩu không chính xác !');
    }
    public function registration()
    {
        return view('register');
    }
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("dashboard")->with('status','Đăng kí thành công !');
    }
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.dashboard');
        }
   
    return redirect("login")->with('status','Vui lòng truy cập bằng tài khoản admin !');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('/login')->with('status','Đã đăng xuất !');
    }
}
