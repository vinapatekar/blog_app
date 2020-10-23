@extends('layouts.user_master')

@section('title')
Welcome User!
@endsection()

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if(!$postsData->isEmpty())
            <div class="card-header">
                <h4 class="card-title">List Of Posts</h4>

                <form action="/searchcat" method="post" role="search">
                    {{ csrf_field() }}
                    <div class="input-group no-border">
                        <input type="text" name="category" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <button type="submit" class="btn btn-default btn-sm">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                            <th>Posted At</th>
                            <th>Updated At</th>

                        </thead>
                        <tbody>
                            @foreach($postsData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->content}}</td>
                                <td>{{$data->category}}</td>
                                <td>{{$data->created_at->diffForHumans()}}</td>
                                <td>{{$data->updated_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach

                            @else

                            <div>
                                <h1>No Posts Have Been Added Yet...!!</h1>
                            </div>

                            @endif

                            {!! $postsData->links() !!}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()

@section('scripts')


@endsection()