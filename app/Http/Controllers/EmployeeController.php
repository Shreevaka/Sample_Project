<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Rules\mobilenumber;

class EmployeeController extends Controller
{
    public function index()
    {
        $employeedetails = Employee::paginate(3);

        return view('admin.employees')->with('employeedetails',$employeedetails);
    }

    public function index1()
    {
        $employeedetails = Employee::paginate(5);

        return view('employees')->with('employeedetails',$employeedetails);
    }

    public function create()
    {
        $companydetails = Company::all();

        return view('admin.createemployee')->with('companydetails',$companydetails);
    }

    public function store(Request $request)
    {
        
        // dd($request->all());

        //Validation
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'company' => 'required',
            'email' => 'email',
            'phone' => [new mobilenumber],
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!empty($request->profile_photo)){
            $profilePhotoName = time() . '_' . $request->first_name . '.'.$request->profile_photo->extension();
        }else{
            $profilePhotoName = "no_image_available.jpg";
        }
        

        DB::beginTransaction();

        try{

            $newemployee = new Employee();
            $newemployee->first_name = $request->first_name;
            $newemployee->last_name = $request->last_name;
            $newemployee->Company = $request->company;
            $newemployee->email = $request->email;
            $newemployee->phone = $request->phone;
            $newemployee->profile_photo = $profilePhotoName;
            $newemployee->save();
            
            if(!empty($request->profile_photo)){
                $request->profile_photo->move(public_path('profile_photo'), $profilePhotoName);
            }

            DB::commit();

            return redirect()->route('admin.employees')->with('status','Employee "'.$newemployee->first_name.'" added..');

        }catch (\Exception $e){
            //  dd($e->getMessage());
            DB::rollBack();
            return back()->withErrors([
            'errors' => $e->getMessage(),
            ]);
        }

    }

    public function edit(Request $request)
    {
        $employeedetails = Employee::find($request->employee_id);
        $companydetails = Company::all();

        return view('admin.editemployee')->with('employeedetails',$employeedetails)->with('companydetails',$companydetails);
    }

    public function update(Request $request)
    {
        
        // dd($request->all());

        //Validation
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'company' => 'required',
            'email' => 'email',
            'phone' => [new mobilenumber],
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(!empty($request->profile_photo)){
            $profilePhotoName = time() . '_' . $request->first_name . '.'.$request->profile_photo->extension();
        }else{
            $profilePhotoName = $request->old_profile_photo;
        }
        

        DB::beginTransaction();

        try{

            $updateemployee = Employee::find($request->employee_id);
            $updateemployee->first_name = $request->first_name;
            $updateemployee->last_name = $request->last_name;
            $updateemployee->Company = $request->company;
            $updateemployee->email = $request->email;
            $updateemployee->phone = $request->phone;
            $updateemployee->profile_photo = $profilePhotoName;
            $updateemployee->save();
            
            if(!empty($request->profile_photo)){
                $request->profile_photo->move(public_path('profile_photo'), $profilePhotoName);
            }

            DB::commit();

            return redirect()->route('admin.employees')->with('status','Employee "'.$updateemployee->first_name.'" updated..');

        }catch (\Exception $e){
            //  dd($e->getMessage());
            DB::rollBack();
            return back()->withErrors([
            'errors' => $e->getMessage(),
            ]);
        }

    }

    public function destroy(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try{

            $deleteemployee = Employee::find($request->employee_id);
            $deleteemployee->delete();

            DB::commit();

            return redirect()->route('admin.employees')->with('status','Employee deleted...');

        }catch (\Exception $e){
            //  dd($e->getMessage());
            DB::rollBack();
            return back()->withErrors([
            'errors' => $e->getMessage(),
            ]);
        }
    }
}
