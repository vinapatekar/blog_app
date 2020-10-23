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
            @if(!$postsData->isEmpty())
            <div class="card-header">
                <h4 class="card-title">List Of Instructors</h4>
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
                            <th>Show</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                <td>
                                    <a href="{{ route('post.show', $data->id)}}">
                                        <button type="submit" class="btn btn-default">SHOW</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', ['post' => $data->id] )}}">
                                        <button type="submit" class="btn btn-info">EDIT</button>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('post.destroy', $data->id )}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
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