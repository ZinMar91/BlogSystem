<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create([
          'content' => $request->get('content'),
          'user_id' => $request->get('user_id'),
          'commendable_id' => $request->get('commendable_id'),
          'commendable_type' => $request->get('commendable_type'),
        ]);
        return redirect(action('PostCreator\PostController@show', $request->get('commendable_id')))->with('status', 'Insert Comment Successfully !');
    }
}
