@extends('layouts.master')

@section('title')
Welcome Admin!
@endsection()

@section('content')

<div class="row">

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <a href="{{URL::to('/post/create')}}">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" style="text-align: center;"> Add Post</h4>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </a>
  </div>

  <div class="col-lg-6 col-sm-6 col-xs-12">
    <a href="{{URL::to('/post')}}">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" style="text-align: center;"> Post List</h4>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </a>
  </div>

</div>
@endsection()

@section('scripts')

@endsection()