@extends('layouts.adminmain')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>
<div class="row">
<div class="col-9">
    
    </div>
    <div class="col-3">
    <a href="{{ route('admin.createemployee') }}" class="btn btn-primary btn-lg btn-block">Add Employee</a>
    </div>
</div><br><br>
<div class="row">
    <div class="col-12">
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
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>E-Mail</th>
                    <th>phone</th>
                    <th>Profile Photo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($employeedetails))
                @foreach ($employeedetails as $emp)
                <tr>
                    <td>{{$emp->first_name}}</td>
                    <td>{{$emp->last_name}}</td>
                    <td>{{$emp->fromcompany->name}}</td>
                    <td>{{$emp->email}}</td>
                    <td>{{$emp->phone}}</td>
                    <td>
                    <img src="{{ asset('/profile_photo/'.$emp->profile_photo) }}" height="100" width="200" />
                    </td>
                    <td>
                    <div class="row">
                        <div class="col-8">
                        <form method="post" action="{{route('admin.editemployee')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="employee_id" value="{{$emp->id}}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                        </div>
                        </div><br>
                        <div class="row">
                        <div class="col-8">
                        <form method="post" action="{{route('admin.destroyemployee')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="employee_id" value="{{$emp->id}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br>

        <div class="pagination-block">
            {{ $employeedetails->links('layouts.paginationlinks') }}
        </div>
        @endif
    </div>
    
</div><br>
@endsection