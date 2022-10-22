<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index()
    {
        $blogs = Blog::orderBy("id", "desc")->paginate(10);

        $data = ['blogs' => $blogs, 'user' => Auth::guard("admin")->user()];
        return view('admin.blog.index', $data);
    }
    function blogs()
    {
        $blogs = Blog::orderBy("id", "desc")->paginate(10);

        $data = ['blogs' => $blogs, 'user' => Auth::guard("admin")->user()];
        return view('admin.blog.index', $data);
    }

    function login()
    {
        return view('admin.login');
    }
    function create()
    {
        return view('admin.blog.create');
    }


    function authenticate(Request $request)
    {
        // $request->validate([
        //     'email' => 'string |  required | email',
        //     'password' => 'string | required'
        // ]);




        $admin = Admin::where('email', $request->email)->first();

        if (Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            return redirect("/admin");
        }




        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    function users()
    {
        $users = User::orderBy("id", "desc")->paginate(10);

        $data = ['users' => $users];
        return view('admin.users', $data);
    }
    function block(Request $request, $id)
    {
        $user = User::find($id);

        $user->block = true;
        $user->save();
        return redirect()
            ->back()
            ->with('success', 'User Blocked Successfully');
    }
    function unblock(Request $request, $id)
    {
        $user = User::find($id);

        $user->block = false;
        $user->save();
        return redirect()
            ->back()
            ->with('success', 'User UnBlocked Successfully');
    }
    public function destroyBlog($id)
    {

        $blog = Blog::find($id);

        $blog->delete();
        return redirect()->back()->with('success', 'Blog Deleted Successfully');
    }
    public function editBlog($id)
    {
        $blog = Blog::find($id);
       
        $data = ['blog' => $blog];
        return view('admin.blog.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBlog(Request $request, $id)
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
}
