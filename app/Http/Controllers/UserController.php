<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $blogs = Blog::orderBy("id", "desc")->paginate(10);

        $data = ['blogs' => $blogs];
        return view('index', $data);
    }
    function dashboard()
    {
        $blogs = Blog::where("user_id", auth()->user()->id)->orderBy("id", "desc")->paginate(10);

        $data = ['blogs' => $blogs];
        return view('user.blog.index', $data);
    }
  
}
