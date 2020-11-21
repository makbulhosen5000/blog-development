<?php

namespace App\Http\Controllers;

use App\Model\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('created_at','DESC')->paginate('20');
        return view('admin.post.post_view',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.post_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:posts,name',
        ]);
        $StoreCategory=new Post();
        $StoreCategory->name=$request->name;
        $StoreCategory->slug=Str::slug($request->name, '-');
        $StoreCategory->description=$request->description;
        $StoreCategory->save();
        Session::flash('success','Post Created Successfully');
        return redirect()->back();

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Mode\Category  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mode\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post,$id)
    {
        $data['EditPost']=Post::find($id);
        return view('admin.post.post_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mode\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,$id)
    {

        $validatedData = $request->validate([
            'name' => "required|unique:posts,name,$post->name",
        ]);

        $UpdateCategory=Post::find($id);
        $UpdateCategory->name=$request->name;
        $UpdateCategory->slug=Str::slug($request->name, '-');
        $UpdateCategory->description=$request->description;
        $UpdateCategory->save();
        Session::flash('success','Post Updated Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mode\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,$id)
    {
        $DeletePost=Post::find($id);
        $DeletePost->delete();
        return redirect()->back();

    }
}
