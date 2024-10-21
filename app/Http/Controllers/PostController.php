<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cache;
use File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('authcheck2', ['except' => ['index', 'show']]);
        $this->middleware("authcheck", ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $posts = Cache::remember('posts-page-'.request('page', 1), 60*60, function () {
            return Post::orderBy("created_at", "asc")->with('category')->paginate(3);
        });
// key=posts=route
        // $posts = Cache::rememberForever('posts',  function () {
        //     return Post::with('category')->paginate(3);
        // });

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
        $post = Post::findOrFail($id);
        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('update', compact('post', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        $this->validate($request, [

            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'description' => 'required',
        ]);
        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            ]);

            $filename = time() . '.' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('uploads', $filename, 'public');

            File::delete(public_path('storage/' . $post->image));

            $post->image = $filepath;
        }

        $post->name = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->save();
        return redirect('/posts');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate(10);
        return view('trash', compact('posts'));
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->restore();
        return redirect()->back();
    }

    public function kill($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        File::delete(public_path('storage/' . $post->image));
        $post->forceDelete();
        return redirect()->back();
    }
}

