<?php

namespace App\Http\Controllers\PostCreator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostInsertFormRequest;
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
        $auth_check = false;
        if (Auth::check() && (Auth::user()->hasRole("Manager") || Auth::user()->hasRole("Post Writer"))) {
          $auth_check = true;
        }
        $posts = Post::all();
        return view('postcreator.posts.index', compact('posts', 'auth_check'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('postcreator.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostInsertFormRequest $request)
    {
        $slug = uniqid();
        Post::create([
          'title' => $request->get('title'),
          'content' => $request->get('content'),
          'slug' => $slug,
          'user_id' => $request->get('user_id'),
          'category_id' => $request->get('category_id'),
        ]);
        return redirect('postcreator/posts/create')->with('status', 'Post Created Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        // dd($comments);
        return view('postcreator.posts.single', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $categories = Category::all();
        return view('postcreator.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostInsertFormRequest $request, $id)
    {
        $post = Post::whereId($id)->firstOrFail();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->update();

        return redirect(action('postcreator\PostController@edit', $id))->with('status', 'Post Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
