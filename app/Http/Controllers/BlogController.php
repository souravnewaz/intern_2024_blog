<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->orderBy('id', 'DESC')->get();

        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $image = null;
        if ($request->hasFile('image')) {
            $path = 'images';
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $image = $path . '/' . $fileName;
        }

        $data = $validator->validated();
        $data['image'] = $image;
        $data['user_id'] = auth()->user()->id;
        Blog::create($data);

        return redirect()->back()->with('success', 'Blog created successfully');
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Blog $blog, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if ($request->hasFile('image')) {
            $path = 'images';
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $data['image'] = $path . '/' . $fileName;
        }

        $data['title'] = $request->title;
        $data['description'] = $request->description;

        $blog->update($data);

        return redirect()->back()->with('success', 'Blog updated successfully');
    }

    public function delete(Blog $blog)
    {
        $blog->delete();

        return redirect('/');
    }
}