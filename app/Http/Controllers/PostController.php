<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $post = Category::count();
        return view('posts', [
            "title" => "All Posts",
            //latest (untuk mengambil data yang terakhir di tambah untuk di letakan di paling atas)
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString()
        ]);
       
    }

    //route model bainding  (variabel yang menerimanya harus sama dengan variabel yang di kirim)
    public function show(Post $post)
    {
        return view('post', [
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
