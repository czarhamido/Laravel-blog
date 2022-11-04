<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequests;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct() {

        $this->middleware('is_admin', ['only' => ['index','create','edit','update','destroy']]);

    }

    public function index()
    {
        //
        $categores=Category::all();
        $posts = Post::when(request('category_id'),function($qeury){
            $qeury->where('category_id',request('category_id'));
        })->latest()->get();
        return view('dashboard',compact('posts','categores'));
    }

    public function showAll()
    {
        //
        $posts = Post::when(request('category_id'),function($qeury){
            $qeury->where('category_id',request('category_id'));
        })->latest()->get();
        return view('welcome',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categores=Category::all();
        return view('posts.create',compact('categores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequests $request)
    {
        //
        Post::create($request->validated());
        return redirect()->route('dashboard.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post=Post::findOrFail($id);

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $post=Post::find($id);
        $categores=Category::all();
        return view('posts.edit',compact('post','categores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequests $request,$id)
    {
        //
        Post::whereId($id)->update($request->validated());
        return redirect()->route('dashboard.index');

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

        $post = Post::find($id)->delete();
    
        return redirect()->route('dashboard.index');
    }
}
