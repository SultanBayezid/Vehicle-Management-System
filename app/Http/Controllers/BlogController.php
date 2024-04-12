<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blogs.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        $imagePath = null;

        if ($request->hasfile('image')) {
            $file          = $request->file('image');
            $imagePath = "image" . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . "/uploads/blogs/", $imagePath);
        }
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,

        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('frontend.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);
    
        $blog = Blog::findOrFail($id);
    
        if ($request->hasFile('image')) {
            // Delete previous image if it exists
            if ($blog->image) {
                $previousImagePath = public_path('uploads/blogs/' . $blog->image);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }
    
            // Upload new image
            $file = $request->file('image');
            $imageName = "image" . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blogs/'), $imageName);
    
            // Update blog with new image
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageName,
            ]);
        } else {
            // Update blog without changing the image
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
        return redirect()->route('blogs.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        // Delete associated image if it exists
        if ($blog->image) {
            $imagePath = public_path('uploads/blogs/' . $blog->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
