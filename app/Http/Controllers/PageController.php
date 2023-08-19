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
    public function news()
    {
        $data['css'] = ['global'];
        return view('wheels.news', $data);

    }
    
}
