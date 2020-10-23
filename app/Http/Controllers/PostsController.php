<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsData = Post::orderBy('id', 'desc')->paginate(3);
        return view("post.post_list", compact('postsData'))->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $posts = new Post();
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category = $request->category;
        $posts->slug = Str::slug($request->title, '-');
        $posts->save();

        return redirect()->route('post.index')->with('success', 'Post Created Successfully..!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postsData = Post::find($id);
        return view('post.show_post', compact('postsData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postsData = Post::find($id);
        return view('post.edit_post', compact('postsData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ]);

        $posts = Post::find($id);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category = $request->category;
        $posts->slug = Str::slug($request->title, '-');
        $posts->update();

        return redirect()->route('post.index')->with('success', 'Post Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postsData = Post::find($id);
        $postsData->delete();
        return redirect('/post')->with('msg_success', 'Deleted Successfully..!');
    }

    public function search(Request $request)
    {
        $category = $request->category;
        $postsData = Post::where('category', 'LIKE', '%' . $category . '%')->paginate(3);
        return view('post.post_list', compact('postsData'))->with('i', (request()->input('page', 1) - 1) * 3);
    }
}
