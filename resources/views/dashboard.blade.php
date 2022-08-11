@extends('layouts.main')

@section('heading')
<h4><span class="badge badge-info"></span></h4>
@endsection

@section('content')
<br>
<div class="card-deck">
  <div class="card border-info">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
    <div class="card-body">
      <h5 class="card-title">Pending Document</h5>
      <p class="card-text">
      Number of Pending Document ...
        <div class="wrapper">
          <span class="badgehome">25</span>
        </div>
      </p>
    </div>
  </div>
  <div class="card border-info">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
    <div class="card-body">
      <h5 class="card-title">Completed Document</h5>
      <p class="card-text">
      Number of Completed Document ...
      <div class="wrapper">
          <span class="badgehome">19</span>
        </div>
      </p>
    </div>
  </div>
  <div class="card border-info">
    <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
    <div class="card-body">
      <h5 class="card-title">Assigned Document</h5>
      <p class="card-text">
      Number of Assigned Document ...
        <div class="wrapper">
          <span class="badgehome">35</span>
        </div>
      </p>
    </div>
  </div>
</div>
<br>


@endsection