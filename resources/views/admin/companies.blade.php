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
    <a href="{{ route('admin.createcompany') }}" class="btn btn-primary btn-lg btn-block">Add Company</a>
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
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Telephone</th>
                    <th>Logo</th>
                    <th>Cover Image</th>
                    <th>Website</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($companydetails))
                @foreach ($companydetails as $com)
                <tr>
                    <td>{{$com->name}}</td>
                    <td>{{$com->email}}</td>
                    <td>{{$com->telephone}}</td>
                    <td>
                    <img src="{{ asset('/logo_images/'.$com->logo) }}" height="100" width="205" />
                    </td>
                    <td>
                    <img src="{{ asset('/cover_images/'.$com->cover_image) }}" height="100" width="200" />
                    </td>
                    <td>{{$com->website}}</td>
                    <td>
                    <div class="row">
                        <div class="col-8">
                        <form method="post" action="{{route('admin.editcompany')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="company_id" value="{{$com->id}}">
                        <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                        </div>
                        </div><br>
                        <div class="row">
                        <div class="col-8">
                        <form method="post" action="{{route('admin.destroycompany')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="company_id" value="{{$com->id}}">
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
            {{ $companydetails->links('layouts.paginationlinks') }}
        </div>
        @endif
    </div>
    
</div><br>
@endsection