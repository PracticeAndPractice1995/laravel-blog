<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if((Auth::user()->role_id) == 1){
            $posts = Post::all();
        } else {
            $posts = Post::where('user_id', Auth::user()->id)->get();
        }

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('body');
        $image = $request->file('image');
        $imageName = time(). '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);
        $post = Post::create([
            'title' => $title,
            'body' => $body,
            'image_link' => $imageName,
            'user_id' => Auth::user()->id,
        ]); 
        if($post){
            return redirect()->route('posts.show', ['post' => $post->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $published = 0;
        $title = $request->input('title');
        $body = $request->input('body');
        $image = $request->file('image');
        if ((Auth::user()->role_id) == 1) {
            $published = $request->status;
        }
        if($image){
            $imageName = time(). '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);      
            $postUpdate = Post::where('id', $post->id)->update([
                'title' => $title,
                'body' => $body,
                'image_link' => $imageName,
                'published' => $published
            ]); 
        }
        else{
            $postUpdate = Post::where('id', $post->id)->update([
                'title' => $title,
                'body' => $body,
                'published' => $published
            ]); 
        }
        if($postUpdate){
            return redirect()->route('posts.show', ['post' => $post->id]);
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $findPost = Post::find($post->id);
        if($findPost->delete()){
            return redirect()->route('posts.index');
        }
        return back()->withInput();
    }

}
