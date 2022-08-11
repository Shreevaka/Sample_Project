@extends('layouts.adminmain')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>
<div class="row">
    <div class="col-3"> 
    </div>
    <div class="col-6">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif
        <div class="card border-secondary">
            <div id="letter_type" class="card-header text-center">
                Update Employee
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.updateemployee') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="employee_id" value="{{$employeedetails->id}}">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="first_name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" value="{{$employeedetails->first_name}}" placeholder="Enter first name" autofocus>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="last_name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{$employeedetails->last_name}}" placeholder="Enter last name" autofocus>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <select id="company" name="company" class="form-control" autofocus>
                            <option value="">Select company</option>
                            @foreach($companydetails as $com)
                            @if($employeedetails->Company == $com->id)
                            <option value="{{$com->id}}" selected>{{$com->name}}</option>
                            @else
                            <option value="{{$com->id}}">{{$com->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$employeedetails->email}}" placeholder="Enter email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{$employeedetails->phone}}" placeholder="Enter phone number" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="old_profile_photo" value="{{$employeedetails->profile_photo}}">
                        <label for="profile_photo">Profile Photo</label>
                        <input id="profile_photo" type="file" class="form-control @error('profile_photo') is-invalid @enderror" name="profile_photo" value="{{ old('profile_photo') }}" autocomplete="profile_photo" autofocus>{{$employeedetails->profile_photo}}
                        @error('profile_photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>                
  
                    <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3"> 
    </div>
</div><br>
@endsection