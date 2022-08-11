@extends('layouts.adminmain')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>
<div class="row">
    <div class="col-1"> 
    </div>
    <div class="col-10">
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
                Profile
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-2"><h5>Name   : </h5></div>
                    <div class="col-5"><h5>{{ auth()->user()->name}}</h5></div>
                </div>
                <div class="form-group row">
                    <div class="col-2"><h5>E-Mail   : </h5></div>
                    <div class="col-5"><h5>{{ auth()->user()->email}}</h5></div>
                    <div class="col-2"></div>
                    <div class="col-3"><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#changepassword">Change Passwoard</a></div>
                </div>

                <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('changepassword')}}">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="current_password">Current Password</label>
                                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" id="current_password" value="{{ old('current_password') }}" placeholder="Enter current password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" value="{{ old('new_password') }}" placeholder="Enter new password" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" placeholder="Re-Enter password" autofocus>
                                    </div>

                                    <div class="text-right">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1"> 
    </div>
</div><br>
@endsection