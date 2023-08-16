<?php

namespace App\Http\Controllers;

use App\Libraries;
use App\Libraries\SharedFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
 
class PageController extends Controller
{
  
    public function login(Request $request){
        $rs = SharedFunctions::prompt_msg('Login Failed');

        $this->validate($request, [
            'email' => 'required|max:120|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|max:255' 
        ]);

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password//,
               // 'user_type' => User::TYPE_ADMIN
            ]);
        }

    }

}