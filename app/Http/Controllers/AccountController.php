<?php

namespace App\Http\Controllers;

use App\Libraries;
use App\Libraries\SharedFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;
class PageController extends Controller
{
  
    public function login(Request $request)
    {
        $rs = SharedFunctions::prompt_msg('Login Failed');

        $this->validate($request, [
            'email' => 'required|max:120|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|max:255' 
        ]);

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'user_type' => User::TYPE_ADMIN
            ]);
        } 
        if (Auth::check()) {
            $rs = SharedFunctions::success_msg('Login success');
            $rs['redirect'] = '/dashboard';
        }
        return response()->json($rs);

    }

    public function save_account(Request $request)
    {
        $rs = SharedFunctions::default_msg();
        $this->validate($request, [
            'email' => 'required|max:100',
            'user_type' => 'required'
        ]);
        if (isset($request->id)) $user = User::find($request->id);
        else $user = new User();
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = bcrypt('password');
        if ($user->save()) $rs = SharedFunctions::success_msg("Account saved successfully!");
        return response()->json($rs);
    }
    public function delete_account(Request $request)
    {
        $rs = SharedFunctions::default_msg();
        $query = User::find($request->id);
        if ($query->delete()) $rs = SharedFunctions::success_msg("Account deleted successfully!");
        return response()->json($rs);
    }

}