<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $hot_news = Post::where('hot_news', 1)->where('status', 1)->orderBy('id', 'DESC')->first();
        $top_view = Post::where('status', 1)->orderBy('view_count', 'DESC')->limit(1)->get();
        $category_posts = Category::with('posts')->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
        return view('front.home', compact('hot_news', 'top_view', 'category_posts'));
    }
}
