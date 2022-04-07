<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $featured_posts = Post::query()
            ->take(10)
            ->get();
        $ages = Age::all();
        $categories = Category::all();
        return view('posts.index', ['posts' => $featured_posts, 'ages' => $ages, 'categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminIndex()
    {
        $posts = Post::all();
        $ages = Age::all();
        $categories = Category::all();
        return view('posts.adminIndex',['posts' => $posts, 'ages' => $ages, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('posts.create', [
            'posts' => Post::all(),
            'categories' => Category::all(),
            'ages' => Age::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'age_id' => 'required',
            'image' => 'required',
        ]);


        $post = Post::create($validated);
        if ($post) {
            return redirect()->route('dashboard.posts.index')->with("success", "Success! Post created");
        }

        return back()->with("failed", "Failed! Post not created");
    }

    /**
     * Upload image
     * @param request
     */
    public function uploadImage(Request $request) {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function edit(Post $post)
    {

        return view('posts.edit', ['post' => $post, 'categories' => Category::all(), 'ages' =>Age::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'age_id' => 'required',
        ]);

        $post->update($request->all());
        return redirect()->route('dashboard.posts.index')->with("success", "Success! Post updated");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public
    function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');

    }
}
