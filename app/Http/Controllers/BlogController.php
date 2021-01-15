<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blog.blog', compact('blogs'));
    }


    public function show(Blog $blog)
    {
        return view('blog.blog-detail', compact('blog'));
    }



    public function create()
    {
        return view('blog.create', ['blog' => new Blog()]);
    }


    public function store(Request $request)
    {
        // validasi
        $this->validateRequest();

        // input data
        Blog::create([
            'title' => ucwords($request->title),
            'slug' => \Str::slug($request->title),
            'body' => $request->body,
        ]);
        session()->flash('success', ucwords('Your blog is successfully created'));

        return redirect()->to('blog');

        // save data good version
        // $blog = $request->all();
        // $blog['slug'] = \Str::slug($request->title);
        // Blog::create($blog);
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validateRequest();

        $blog->update([
            'title' => ucwords($request->title),
            'body' => $request->body,
        ]);

        session()->flash('success', ucwords('Your blog is successfully Updated'));

        return redirect()->to('blog');
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|max:40',
            'body'  => 'required',
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', ucwords('the blog has been deleted'));
        return redirect()->to('blog');
    }
}
