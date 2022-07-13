<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;

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
    $title = 'Home';
    return view('home', compact('title'));
});

Route::get('/about', function () {
    $title = 'About';
    return view('about', compact('title'));
});



Route::get('/posts',  [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    $title = 'Categories';
    return view('categories', [
        'title' => $title,
        'judul' => 'Post Cotegories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
//biasa digunakan ketika kita mau nyimpan
Route::post('/register', [RegisterController::class, 'store']);

//closiur
Route::get('/dashboard', function(){
    $user = User::count();
    $post = Post::count();
    $categories = Category::count();
    return view('dashboard.index', compact('user','post','categories'));
})->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
//resource-controllers
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

//category route model bainding
// Route::get('/categories/{category:slug}', function (Category $category) {
//     $title = "Post by Category : $category->name";
//     return view('posts', [
//         'title' => $title,
//         'judul' => "$category->judul",
//         'posts' => $category->posts->load('category', 'user')
//     ]);
// });

//menggunakan route model bainding, variabel yang ada pada function harus sama dengan value yang ada di get.
// Route::get('/authors/{author:username}', function (User $author) {
//     $title = "Post by Author : $author->name";
//     return view('posts', [
//         'title' => $title,
//         //load (untuk lazy eager loading pada model bainding, supaya loading mempersedikit query ke database dan mengambil query pada data yang sudah ada )
//         'posts' => $author->posts->load('category', 'user'),
//     ]);
// });
