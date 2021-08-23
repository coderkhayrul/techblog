<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ListingPageController extends Controller
{
    public function index()
    {
        return view('front.listing');
    }

    public function listing($id)
    {
        $posts = Post::where('status', 1)->where('category_id', $id)->orWhere('created_by', $id)->orderBy('id', 'DESC')->paginate(5);
        // dd($posts);

        return view('front.listing', compact('posts'));
    }
}
