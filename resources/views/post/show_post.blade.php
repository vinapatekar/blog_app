@extends('layouts.master')

@section('title')
Welcome Admin!
@endsection()

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Post</h4>
            </div>

            <div class="card-body">
                <div class="content">

                    <h1 class="title">{{ $postsData->title }}</h1>

                    <p><b>Posted:</b> {{ $postsData->created_at->diffForHumans() }}</p>
                    <p><b>Category:</b> {{ $postsData->category }}</p>
                    <p><b>Content:</b> {{ $postsData->content }}</p>

                    <form action="/PostsController/destroy/{{ $postsData->id }}" method="get">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection()

@section('scripts')


@endsection()