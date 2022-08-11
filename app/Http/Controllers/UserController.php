<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginpage()
    {
        return view('auth.login');
    }
    
    public function registerpage()
    {
        return view('auth.register');
    }
    
    public function admindashboard()
    {
        return view('Admin.dashboard');
    }
    
    public function userdashboard()
    {
        return view('dashboard');
    }
}
