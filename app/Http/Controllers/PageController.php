<?php

namespace App\Http\Controllers;
use App\Libraries\SharedFunctions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\User;

class PageController extends Controller
{
  
    public function dashboard()
    {
        $data['css'] = ['global'];
        return view('wheels.dashboard', $data);
    }
    public function account()
    {
        $data['css'] = ['global'];
        return view('wheels.account', $data);
       
    }
    public function login()
    {
        $data['css'] = ['global'];
        return view('wheels.login', $data);
       
    }
    public function register()
    {
        $data['css'] = ['global'];
        return view('wheels.register', $data);
       
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
}
