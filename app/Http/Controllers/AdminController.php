<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function adminView()
    {
        if (Auth::check()) {
            return view('admin',['uid' => Auth::user()->uid]);
             }
            else return redirect('/login');
    }

}
