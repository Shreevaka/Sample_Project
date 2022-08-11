<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Validator;

class WebInterfaceController extends Controller
{
    public function getcompany()
    {
        $companydetails = Company::all();

        return response()->json($companydetails, 200);
    }

    public function getemployee()
    {
        $employeedetails = Employee::all();

        return response()->json($employeedetails, 200);
    }

    public function getprofiledata(Request $request)
    {
        
            $profiledetails = User::find($request->id);

            return response()->json($profiledetails, 200);
             
    }

    public function changepassword(Request $request)
    {

        // dd($request->all());

        $validator = Validator::make($request->all(), [

            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|min:4',
            'confirm_password' => 'required|same:new_password',

        ]);
   
        if($validator->fails()){
            return response()->json($validator->errors(),202);       
        }

        $user = User::find($request->id);
        $user->password = Hash::make($request->new_password);
        $result = $user->save();

        if($result){
            return response()->json(['result'=>'passwoard updated'], 200);
        }else{
            return response()->json(['error'=>'passwoard not update'], 203);
        }
     }

     public function deletecompany(Request $request)
    {
        // dd($request->all());

        $deletecompany = Company::find($request->company_id);
        $result = $deletecompany->delete();

        if($result){
            return response()->json(['result'=>'company deleted'], 200);
        }else{
            return response()->json(['error'=>'company not deleted'], 203);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        
        return response()->json(['message'=>'You have successfully logout!'], 200);
        
    }
}
