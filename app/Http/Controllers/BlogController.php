<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
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

        $data = $validator->validated();
        $data['user_id'] = auth()->user()->id;
        Blog::create($data);

        return redirect()->back()->with('success', 'Blog created successfully');
    }
}
