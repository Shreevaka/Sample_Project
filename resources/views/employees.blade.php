@extends('layouts.main')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>

<div class="row">
    <div class="col-12">
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>E-Mail</th>
                    <th>phone</th>
                    <th>Profile Photo</th>
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