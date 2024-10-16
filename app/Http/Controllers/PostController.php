<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("created_at","asc")->paginate(10);
        
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        
        $filename = time() . '.' . $request->image->getClientOriginalName();
        $filepath = $request->image->storeAs('uploads', $filename, 'public');
        $post = new Post();
        $post->image = $filepath;
        $post->name = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save(); 

        return redirect('/posts');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
