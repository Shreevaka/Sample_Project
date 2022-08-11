@extends('layouts.adminmain')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>
<div class="row">
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

    <div class="col-4">
        <div class="card border-secondary">
            <div id="letter_type" class="card-header text-center">
                Add Employee
            </div>
            <div class="card-body">
                <form method="POST" action="#">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="Enter name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="phone_number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="Enter phone number" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Enter email" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="issued_to">Designation</label>
                        <select id="issued_to" name="issued_to" class="form-control">
                            <option value="#">designation</option>
                            <option value="#">name</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="privilege">Privilege</label>
                        <select id="privilege" name="privilege" class="form-control">
                            <option value="#">user</option>
                            <option value="#">name</option>
                        </select>
                    </div>                   
  
                    <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
           
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>E Mail</th>
                    <th>Designation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($userdetails))
                @foreach ($userdetails as $usr)
                <tr>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->phone_number}}</td>
                    <td>{{$usr->email}}</td>
                    <td>{{$usr->designation}}</td>
                    <td><button type="button" class="btn btn-danger">Reset Password</button></td>
                </tr>
                @endforeach
            </tbody>
        </table><br>

        <div class="pagination-block">
            {{ $userdetails->links('layouts.paginationlinks') }}
        </div>
        @endif
    </div>
</div><br>
@endsection