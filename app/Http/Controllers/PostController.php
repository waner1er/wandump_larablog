<?php

namespace App\Http\Controllers;

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
        $posts = Post::with('ageCategory');
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminIndex()
    {
        return view('posts.adminIndex', ['posts'=>Post::all()]);
    }

/**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $postRequest = array(
            "title" => $request->title,
            "description" => $request->description
        );
        $post = Post::create($postRequest);

        if ($post) {
            return back()->with("success", "Success! Post created");
        }

        return back()->with("failed", "Failed! Post not created");
    }

    /**
     * Upload image
     * @param request
     */
    public function uploadImage(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->move('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/'.$filenametostore);
            $message = 'File uploaded successfully';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
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
        return view('posts.edit', ['post' => $post]);
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
        $rules = [
            'title' => 'required|string',
            "description" => 'required',
        ];
        $this->validate($request, $rules);
//        dd($request);
        $post->update([
            "title" => $request->title,
            "description" => $request->description
        ]);
              return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/');

    }
}
