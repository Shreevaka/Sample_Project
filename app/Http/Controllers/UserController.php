<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

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

    public function index()
    {
        return view('profile');
    }

    public function changepassword(Request $request)
    {

        // dd($request->all());

        $this -> validate($request,[

            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:4',
            'confirm_password' => 'required|same:new_password',

        ]);

        DB::beginTransaction();

        try{

        $user = User::find(Auth::user()->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        DB::commit();

        return back()->with('status','Password Changed..');

        }catch (\Exception $e) {

            DB::rollback();
            return redirect()->back()->withErrors([$e->getMessage()]);

        }

     }
}
