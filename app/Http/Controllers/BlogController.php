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
        $thumbnail = $request->file('thumbnail');
        // $thumbnailUrl = $thumbnail->storeAs("images/blogs", "{$slug}.{$thumbnail->extension()}");
        $thumbnailUrl = $thumbnail->store("images/blogs");


        // validasi
        $this->validateRequest();

        // input data with out autentications
        // Blog::create([
        //     'title' => ucwords($request->title),
        //     'category_id' => $request->category,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);
        if (isset($request->new_category) && !isset($request->category)) {
            Category::create([
                'name' => ucwords($request->new_category),
                'slug' => \Str::slug($request->new_category),
            ]);
            $new_kategory = Category::where('name', $request->new_category)->first();

            // input data with authentications
            auth()->user()->blogs()->create([
                'title' => ucwords($request->title),
                'category_id' => $new_kategory->id,
                'thumbnail' => $thumbnailUrl,
                'slug' => \Str::slug($request->title),
                'body' => $request->body,
            ]);


            session()->flash('success', ucwords('Your blog is successfully created'));
        } elseif (!isset($request->new_category) && isset($request->category)) {
            // input data with authentications
            auth()->user()->blogs()->create([
                'title' => ucwords($request->title),
                'category_id' => $request->category,
                'thumbnail' => $thumbnailUrl,
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
        if ($request->file('thumbnail')) {
            \Storage::delete($blog->thumbnail);
            $thumbnail = $request->file('thumbnail')->store("images/blogs");
        } else {
            $thumbnail = $blog->thumbnail;
        }

        $this->validateRequest();


        // use Auth for update
        if (auth()->user()->id == $blog->user_id) {
            if (!isset($request->new_category)) {
                $categoryAttr = $request->category;

                session()->flash('success', ucwords('Your blog is successfully Updated'));
            }
            if (isset($request->new_category)) {
                Category::create([
                    'name' => ucwords($request->new_category),
                    'slug' => \Str::slug($request->new_category),
                ]);
                $categoryAttr = Category::where('name', $request->new_category)->first()->id;


                session()->flash('success', ucwords('Your blog is successfully Updated'));
            }
            $blog->update([
                'title' => ucwords($request->title),
                'category_id' => $categoryAttr,
                'thumbnail' => $thumbnail,
                'body' => $request->body,
            ]);
        } else {
            session()->flash('error', ucwords('Your blog is unsuccessfully Updated'));
        }
        return redirect()->to('blog');
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|max:40',
            // 'category' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:5100',
            'body'  => 'required',
        ]);
    }

    public function destroy(Blog $blog)
    {
        // auth for delete
        if (auth()->user()->id == $blog->user_id) {
            $blog->delete();
            \Storage::delete($blog->thumbnail);
            session()->flash('success', ucwords('the blog has been deleted'));
            return redirect()->to('blog');
        } else {
            session()->flash('error', ucwords('this not your blog'));
            return redirect()->to('blog');
        }
    }
}
