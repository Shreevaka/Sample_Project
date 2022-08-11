<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return response()->json($validator->errors(),202);       
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success = [];
        $success['token'] =  $user->createToken('api.application')->accessToken;
        $success['name'] =  $user->name;
   
        return response()->json($success, 200);
    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            
            // $success['token'] =  'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYTRjZjRiNjEzNWYwYTFiM2YyYjIyNTY5MDYwYmZlMDNjY2NhMDVkNTg4OTlkOTY2Y2MyMTlmYThjNGRmMzQ0OGE5NjljNDM3NWNiNThiMTIiLCJpYXQiOjE2MzgzNDE3NDAuNDU0NTU2LCJuYmYiOjE2MzgzNDE3NDAuNDU0NTYsImV4cCI6MTY2OTg3NzczOS40NDA3ODcsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.gQ68-9YJZ9mDSngx_EDWrkFtcRSbcb3XykWpJpa274Mt0SGcvRmhjKWJvhJzCK7n5ch2Y8Q3_OMfx0t2_s2KNF8yI48hidjiRcfU4nYY50sAIDsUav3ICsAVNdJJDD_5gSjwOwUWBClNL0YzTNcZ1L8c4cxELvt0utFsZajpjZHUv60gnu9bYNqd-I5FF9m7lreEOVviWHwjh6_NHaORtXnBxsWdJ1nAc1mC07ecYt3-8Hw_jThrL74Fp-1DW43IusGLF7iNXzsPHZkCoCTg_ZNmCPa5MaEiVytivtDOt3YutiCL__1exukEFVFvUIq8AQfsuPsdSIS10P7mPUDenGENXUWITm5T98FnrHuZoonFXP0etnZwcSQqCkDzC6j2vdbAwa1FTK9oaE-ccFgcjR-d2y6PuoieER5lMAeOR3CEsJERNZkeI8ANHbNaoCwL1CWlMM95Ak47NdiNWhmNn38VO0IMkXlVGvyiXPODwN4KXvbyn9eTYDwd2f9PN3IPhHN6radu7m0jc2fGR3hCrNug5dbL6_c6c4tDtZIxEUt7yPTQ4DiMA2aSMS0_LID4gffwOdp1Yzkvw3x2HvINWbh4rjJXQbL4KRXN4T_ZKQHw9a3kqXyp43p9AGzJinfWhB1Sahtf9m9eKrJn8A4cpcBPVWrvJiUHVcMlvExhPZE'; 
            $success = [];
            $success['token'] =  $user->createToken('api.application')->accessToken;
            $success['name'] =  $user->name;
            $success['id'] =  $user->id;
   
            return response()->json($success, 200);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 203);
        } 
    }
}
