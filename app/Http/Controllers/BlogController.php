<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
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
        return view('blog.create', [
            'blog'          => new Blog(),
            'categories'    => Category::get(),
        ]);
    }


    public function store(Request $request)
    {
        // validasi
        $this->validateRequest();
        $attr = $request->new_category;
        $attr2 = $request->category;

        // input data with out autentications
        // Blog::create([
        //     'title' => ucwords($request->title),
        //     'category_id' => $request->category,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);
        if (isset($attr) && !isset($attr2)) {
            Category::create([
                'name' => ucwords($request->new_category),
                'slug' => \Str::slug($request->new_category),
            ]);
            $new_kategory = Category::where('name', $request->new_category)->first();

            // input data with authentications
            auth()->user()->blogs()->create([
                'title' => ucwords($request->title),
                'category_id' => $new_kategory->id,
                'slug' => \Str::slug($request->title),
                'body' => $request->body,
            ]);


            session()->flash('success', ucwords('Your blog is successfully created'));
        } elseif (!isset($attr) && isset($attr2)) {
            // input data with authentications
            auth()->user()->blogs()->create([
                'title' => ucwords($request->title),
                'category_id' => $request->category,
                'slug' => \Str::slug($request->title),
                'body' => $request->body,
            ]);
            session()->flash('success', ucwords('Your blog is successfully created'));
        } else {
            session()->flash('error', ucwords('Your blog is unsuccessfully created'));
        }

        // input data with authentications
        // auth()->user()->blogs()->create([
        //     'title' => ucwords($request->title),
        //     'category_id' => $attr2,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);


        return redirect()->to('blog');

        // save data good version
        // $blog = $request->all();
        // $blog['slug'] = \Str::slug($request->title);
        // Blog::create($blog);
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog,
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validateRequest();

        // use Auth for update
        if (auth()->user()->id == $blog->user_id) {
            $blog->update([
                'title' => ucwords($request->title),
                'category_id' => $request->category,
                'body' => $request->body,
            ]);

            session()->flash('success', ucwords('Your blog is successfully Updated'));
            return redirect()->to('blog');
        } else {
            session()->flash('error', ucwords('Your blog is unsuccessfully Updated'));
            return redirect()->to('blog');
        }
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|max:40',
            // 'category' => 'required',
            'body'  => 'required',
        ]);
    }

    public function destroy(Blog $blog)
    {
        // auth for delete
        if (auth()->user()->id == $blog->user_id) {
            $blog->delete();
            session()->flash('success', ucwords('the blog has been deleted'));
            return redirect()->to('blog');
        } else {
            session()->flash('error', ucwords('this not your blog'));
            return redirect()->to('blog');
        }
    }
}
