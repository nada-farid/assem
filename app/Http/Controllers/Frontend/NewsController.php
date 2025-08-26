<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewCategory;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Blog;

class NewsController extends Controller
{
    //
    public function news()
    {
        $news = News::paginate(6);
        return view('frontend.news', compact('news'));
    }

    public function new($id){
        $new = News::find($id);
        return view('frontend.new',compact('new'));
    }
    public function blogs()
    {
        $blogs = Blog::withCount('comments')->paginate(6);
        $news = News::latest()->take(3);
        return view('frontend.blogs', compact('blogs','news'));
    }

    public function blog($id){
        $blog = Blog::find($id);
        return view('frontend.blog',compact('blog'));
    }
}
