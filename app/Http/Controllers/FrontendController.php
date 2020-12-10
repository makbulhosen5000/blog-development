<?php

namespace App\Http\Controllers;
use App\Model\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $data['frontendPosts']=Post::orderBy('created_at','DESC')->take(4)->get();
        $data['recentPosts']=Post::orderBy('created_at','DESC')->paginate();
           return view('layouts.home',$data);
    }
    public function about()
    {
        return view('website.about');
    }

    public function category()
    {
        return view('website.category');
    }


    public function contact()
    {
        return view('website.contact');
    }

    public function post()
    {
        return view('website.post');
    }


}
