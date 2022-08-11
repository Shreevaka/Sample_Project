<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companydetails = Company::paginate(3);

        return view('admin.companies')->with('companydetails',$companydetails);
    }

    public function index1()
    {
        $companydetails = Company::paginate(5);

        return view('companies')->with('companydetails',$companydetails);
    }

    public function create()
    {
        return view('admin.createcompany');
    }

    public function store(Request $request)
    {
        
        // dd($request->all());

        //Validation
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'email',
            'telephone' => 'numeric|min:10',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'min:3',
        ]);

        if(!empty($request->logo)){
            $logoImageName = time() . '_' . $request->name . '.'.$request->logo->extension();
        }else{
            $logoImageName = "no_image_available.jpg";
        }

        if(!empty($request->cover_image)){
            $coverImageName = time() . '_' . $request->name . '.'.$request->cover_image->extension();
        }else{
            $coverImageName = "no_image_available.jpg";
        }
        

        DB::beginTransaction();

        try{

            $newcompany = new Company();
            $newcompany->name = $request->name;
            $newcompany->email = $request->email;
            $newcompany->telephone = $request->telephone;
            $newcompany->logo = $logoImageName;
            $newcompany->cover_image = $coverImageName;
            $newcompany->website = $request->website;
            $newcompany->save();
            
            if(!empty($request->logo)){
                $request->logo->move(public_path('logo_images'), $logoImageName);
            }

            if(!empty($request->cover_image)){
                $request->cover_image->move(public_path('cover_images'), $coverImageName);
            }

            DB::commit();

            return redirect()->route('admin.companies')->with('status','Company "'.$newcompany->name.'" added..');

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
        $companydetails = Company::find($request->company_id);
        return view('admin.editcompany')->with('companydetails',$companydetails);
    }

    public function update(Request $request)
    {
        
        // dd($request->all());

        //Validation
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'email',
            'telephone' => 'numeric|min:10',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=100,min_height=100',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website' => 'min:3',
        ]);

        if(!empty($request->logo)){
            $logoImageName = time() . '_' . $request->name . '.'.$request->logo->extension();
        }else{
            $logoImageName = $request->old_logo;
        }

        if(!empty($request->cover_image)){
            $coverImageName = time() . '_' . $request->name . '.'.$request->cover_image->extension();
        }else{
            $coverImageName = $request->old_cover_image;
        }
        

        DB::beginTransaction();

        try{

            $updatecompany = Company::find($request->company_id);
            $updatecompany->name = $request->name;
            $updatecompany->email = $request->email;
            $updatecompany->telephone = $request->telephone;
            $updatecompany->logo = $logoImageName;
            $updatecompany->cover_image = $coverImageName;
            $updatecompany->website = $request->website;
            $updatecompany->save();
            
            if(!empty($request->logo)){
                $request->logo->move(public_path('logo_images'), $logoImageName);
            }

            if(!empty($request->cover_image)){
                $request->cover_image->move(public_path('cover_images'), $coverImageName);
            }

            DB::commit();

            return redirect()->route('admin.companies')->with('status','Company "'.$updatecompany->name.'" updated..');

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

            $deletecompany = Company::find($request->company_id);
            $deletecompany->delete();

            DB::commit();

            return redirect()->route('admin.companies')->with('status','Company deleted...');

        }catch (\Exception $e){
            //  dd($e->getMessage());
            DB::rollBack();
            return back()->withErrors([
            'errors' => $e->getMessage(),
            ]);
        }
    }
}
