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
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>Telephone</th>
                    <th>Logo</th>
                    <th>Cover Image</th>
                    <th>Website</th>
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