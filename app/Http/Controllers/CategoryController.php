<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('created_at','DESC')->paginate('20');
        return view('admin.category.category_view',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.category_create');
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
            'name' => 'required|unique:categories,name',
        ]);
        $StoreCategory=new Category();
        $StoreCategory->name=$request->name;
        $StoreCategory->slug=Str::slug($request->name, '-');
        $StoreCategory->description=$request->description;
        $StoreCategory->save();
        Session::flash('success','Category Created Successfully');
        return redirect()->back();

    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Mode\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mode\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {
        $data['EditCategory']=Category::find($id);
        return view('admin.category.category_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mode\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {

        $validatedData = $request->validate([
            'name' => "required|unique:categories,name,$category->name",
        ]);

        $UpdateCategory=Category::find($id);
        $UpdateCategory->name=$request->name;
        $UpdateCategory->slug=Str::slug($request->name, '-');
        $UpdateCategory->description=$request->description;
        $UpdateCategory->save();
        Session::flash('success','Category Updated Successfully');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mode\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $DeleteCategory=Category::find($id);
        $DeleteCategory->delete();
        return redirect()->back();

    }
}
