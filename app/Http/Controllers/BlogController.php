<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $menus = [
            [
                'path' => 'blog-list',
                'name' => 'Blog List'
            ]
        ];
        return view('main', compact('menus'));
    }

    function blogs()
    {
        $blogs = Blog::paginate(3);
        return view('blogs', compact('blogs'));
    }

    function blog($id)
    {
        $blog = Blog::where('id', $id)->with('user')->first();
        return view('blog', compact('blog'));
    }

    function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:50|unique:blogs',
            ],
            [
                'title.unique' => 'The title has already been taken.'
            ]
        );
        Blog::insert([
            'title' => $request->title,
            'user_id' => Auth::id()
        ]);
        return redirect(route('blog-list'));
    }

    function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return back()->withErrors(['title' => "blog is not found"]);
        }
        if ($request->title !== $blog->title) {
            $request->validate(
                [
                    'title' => 'required|max:50|unique:blogs'
                ],
                [
                    'title.unique' => 'The title has already been taken.'
                ]
            );
        }
        Blog::find($id)->update(['title' => $request->title]);
        return redirect(route('blog', ['id' => $id]));
    }

    function delete($id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return back()->withErrors(['error' => "blog is not found"]);
        }
        Blog::where('id', $id)->delete();
        return redirect(route('blog-list'));
    }
}
