@extends('layouts.master')

@section('title')
Edit Post
@endsection()

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- 12 row -->
            <div class="card">
                <div class="card-header">
                    <h3>Edit Post</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <form action="{{ route('post.update', [$postsData->id]) }}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                @method('patch')
                                <div class="form-group">
                                    <label>Post Title</label>
                                    <input type="text" name="title" value="{{ $postsData->title }}" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Post Content</label>
                                    <textarea name="content" class="form-control" required>{{ $postsData->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="select">
                                        <select name="category" required>
                                            <option value="" disabled selected>Select category</option>
                                            <option value="category_one" {{ $postsData->category === 'category_one' ? 'selected' : null }}>Category One</option>
                                            <option value="category_two" {{ $postsData->category === 'category_two' ? 'selected' : null }}>Category Two</option>
                                            <option value="category_three" {{ $postsData->category === 'category_three' ? 'selected' : null }}>Category Three</option>
                                            <option value="category_four" {{ $postsData->category === 'category_four' ? 'selected' : null }}>Category Four</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="Submit" class="btn btn-success">Publish</button>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
@endsection()

@section('scripts')


@endsection()