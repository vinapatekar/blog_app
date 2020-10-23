@extends('layouts.master')

@section('title')
Add Post
@endsection()

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- 12 row -->
            <div class="card">
                <div class="card-header">
                    <h3>Add Post</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">

                            <form action="{{URL::to('/post')}}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Post Title</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Post Content</label>
                                    <input type="textarea" name="content" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <div class="select">
                                        <select name="category" required class="form-control">
                                            <option value="" disabled selected>Select category</option>
                                            <option value="category_one" {{ old('category') === 'category_one' ? 'selected' : null }}>Category One</option>
                                            <option value="category_two" {{ old('category') === 'category_two' ? 'selected' : null }}>Category Two</option>
                                            <option value="category_three" {{ old('category') === 'category_three' ? 'selected' : null }}>Category Three</option>
                                            <option value="category_four" {{ old('category') === 'category_four' ? 'selected' : null }}>Category Four</option>
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