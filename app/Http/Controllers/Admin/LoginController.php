<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function getlogin(){

        return view('admin.Auth.login');

    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            // notify()->success('تم الدخول بنجاح ');
            return redirect() -> route('admin.dashboard');
        }
            // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

    }
}
