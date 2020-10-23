<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//for User
Route::group(['middleware'  => ['auth', 'user']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/searchcat', function (Request $request) {
        $category = $request->category;
        $postsData = Post::where('category', 'LIKE', '%' . $category . '%')->paginate(3);
        return view('home', compact('postsData'))->with('i', (request()->input('page', 1) - 1) * 3);
    });
});

//for Admin
Route::group(['middleware'  => ['auth', 'admin']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    //for posts
    Route::resource('post', App\Http\Controllers\PostsController::class);

    //for search
    Route::post('/search', [App\Http\Controllers\PostsController::class, 'search']);
});
