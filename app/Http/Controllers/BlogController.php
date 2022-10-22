<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where("user_id", auth()->user()->id)->orderBy("id", "desc")->paginate(10);
        $data = ['blogs' => $blogs];
        return view('user.blog.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'string | required',
            'body' => 'string | required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move("uploads/", $image);
        }
        $blog = Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'created_at' => now()

        ]);
        return redirect()->back()->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        $data = ['blog' => $blog];
        return view('blog', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        if ($blog->user->id != auth()->user()->id) {
            return redirect()->back()->with('errore', 'Unauthorized');
        }
        $data = ['blog' => $blog];
        return view('user.blog.edit', $data);
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
        $blog = Blog::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move_uploaded_file("uploads/", $image);
            $blog->image = $image;
        }
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->updated_at = now();

        $blog->save();
        return redirect()->back()->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blog = Blog::find($id);

        $blog->delete();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }
}
