<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Post;
use App\Model\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;
use Auth;
use Carbon\Carbon;


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

        $data['categories']=Category::all();
        $data['tags']=Tag::all();
        return view('admin.post.post_create',$data);
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
            'title' => 'required|unique:posts,title',
            'image' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        // $StorePost=Post::all();
        // $StorePost->title=$request->title;
        // $StorePost->slug=Str::slug($request->title);
        // $StorePost->description=$request->description;
        // $StorePost->category_id=$request->category_id;
        // $StorePost->user_id=$request->auth()->user()->id;
        // $StorePost->published_at=$request->Carbon::now();
        // if($request->hasFile('image')){
        //     $file=$request->file('image');
        //     $extension=$file->getClientOriginalExtension();
        //     $newImage=time().'.'.$extension;
        //     $file->move('storage/post/',$newImage);
        //     $StorePost->image=$newImage;
        // }else{
        //     return $request;
        //     $StorePost->image='';
        // }
        // $StorePost->save();
        $StorePost = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $request->image,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);
        $StorePost->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('storage/post/',$newImage);
            $StorePost->image=$newImage;
        }else{
            return $request;
            $StorePost->image='';
        }
        $StorePost->save();
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
        $data['showPosts']=Post::all();
        $data['showTags']=Tag::all();
        return view('admin.post.post_show',$data);
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
        $data['categories']=Category::all();
        $data['tags']=Tag::all();
        return view('admin.post.post_edit',$data);
    }
    public function update(Request $request, Post $post,$id)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $updatePost=Post::find($id);
        $updatePost->title=$request->title;
        $updatePost->slug=Str::slug($request->title);
        $updatePost->description=$request->description;
        $updatePost->category_id=$request->category_id;
        $updatePost->tags()->sync($request->tags);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $newImage=time().'.'.$extension;
            $file->move('storage/image/',$newImage);
            $updatePost->image=$newImage;
        }else{
            return $request;
            $updatePost->image='';
        }
        $updatePost->save();
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
