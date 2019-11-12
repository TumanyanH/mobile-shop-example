<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** 
     * where user must go
     */
    public function adminLogin()
    {
        if(Auth::guest()){
            return redirect()->route('admin.login');
        }elseif(Auth::user() && Auth::user()->role_id != 4) {
            return redirect()->to('/admin/home');
        }else{
            return redirect()->back();
        }
    }
}
