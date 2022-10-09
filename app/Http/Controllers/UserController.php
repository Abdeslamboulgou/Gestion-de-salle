<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function userView(Request $request)
    {
        if (Auth::check()) {
            return view('user',['uid' => Auth::user()->uid]);
             }
            else return redirect('/login');
            
    }

}
