<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
      return view('admin.users.login',[
        'title' => 'Hệ thông đăng nhập'
      ]);
      
    }

    public function store(AuthRequest $request){
        $credentials =[
            'email' => $request->input('email'),
            'password' =>$request->input('password')
        ];
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }
        return redirect()->route('login')->with('error','Sai thông tin');
    }

    public function logout(Request $request){
      Auth::logout();
 
      $request->session()->invalidate();
   
      $request->session()->regenerateToken();
   
      return redirect()->route('login');
    }
}
