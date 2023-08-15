<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
 
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

}
