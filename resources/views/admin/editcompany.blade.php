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
                Update Company
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.updatecompany') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="company_id" value="{{$companydetails->id}}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$companydetails->name}}" placeholder="Enter name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$companydetails->email}}" placeholder="Enter email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="telephone" class="form-control @error('telephone') is-invalid @enderror" name="telephone" id="telephone" value="{{$companydetails->telephone}}" placeholder="Enter telephone number" autofocus>
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="old_logo" value="{{$companydetails->logo}}">
                        <label for="logo">Logo</label>
                        <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" autocomplete="logo" autofocus>{{$companydetails->logo}}
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input type="hidden" name="old_cover_image" value="{{$companydetails->cover_image}}">
                        <label for="cover_image">Cover Image</label>
                        <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" autocomplete="cover_image" autofocus>{{$companydetails->cover_image}}
                        @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <textarea class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}" placeholder="Enter website" autofocus rows="3">{{$companydetails->website}}</textarea>
                        @error('website')
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