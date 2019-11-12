<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    /** 
     * signin admin
     */
    public function signIn(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:256',
            'password' => 'required|min:8|max:256',
        ]);

        $userCheck = User::where('email', $request->email)->first();
        if($userCheck) {
            if($userCheck->role_id < 4) {
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->route('admin.home');
                }
            }

        }
    }

    /** 
     * admin-user logout
     * 
     * @return redirect
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    /** 
     * admin home view 
     */
    public function home()
    {
        return view('admin.home');
    }
    
}
