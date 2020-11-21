<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::orderBy('created_at','DESC')->paginate('20');
        return view('admin.tag.tag_view',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.tag_create');
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
            'name' => 'required|unique:tags,name',
        ]);
        $StoreTag=new Tag();
        $StoreTag->name=$request->name;
        $StoreTag->slug=Str::slug($request->name, '-');
        $StoreTag->description=$request->description;
        $StoreTag->save();
        Session::flash('success','Tag Created Successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mode\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mode\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag,$id)
    {
        $data['EditTag']=Tag::find($id);
        return view('admin.tag.tag_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mode\Tag  $Tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag,$id)
    {

        $validatedData = $request->validate([
            'name' => "required|unique:tags,name,$tag->name",
        ]);

        $UpdateTag=Tag::find($id);
        $UpdateTag->name=$request->name;
        $UpdateTag->slug=Str::slug($request->name, '-');
        $UpdateTag->description=$request->description;
        $UpdateTag->save();
        Session::flash('success','Tag Updated Successfully');
        return redirect()->back();

    }

    public function destroy(Tag $tag,$id)
    {
        $DeleteTag=Tag::find($id);
        $DeleteTag->delete();
        return redirect()->back();

    }
}
