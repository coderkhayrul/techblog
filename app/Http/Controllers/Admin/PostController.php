<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type === 1 || Auth::user()->hasRole('Editor')) {
            $posts = Post::orderBy('id', 'DESC')->get();
        } else {
            $posts = Post::where('created_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        $page_name = "Posts";

        return view('admin.post.list', compact('page_name', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Post Create";
        $categories = Category::where('status', 1)->pluck('name', 'id')->toArray();
        return view('admin.post.create', compact('page_name', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'img' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->category_id = $request->category_id;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->status = 1;
        $post->view_count = 1;
        $post->hot_news = 0;
        $post->main_image = '';
        $post->thumb_image = '';
        $post->list_image = '';
        $post->created_by = Auth::id();
        $post->save();

        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main' . $post->id . '.' . $extension;
        $thumb_image = 'post_thumb' . $post->id . '.' . $extension;
        $list_image = 'post_list' . $post->id . '.' . $extension;
        Image::make($file)->resize(653, 569)->save(public_path('/upload/post/') . $main_image);
        Image::make($file)->resize(360, 309)->save(public_path('/upload/post/') . $thumb_image);
        Image::make($file)->resize(122, 122)->save(public_path('/upload/post/') . $list_image);
        $post->main_image = $main_image;
        $post->thumb_image = $thumb_image;
        $post->list_image = $list_image;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post Created Successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Post Edit";
        $categories = Category::where('status', 1)->pluck('name', 'id')->toArray();
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('page_name', 'categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        $post = Post::findOrFail($id);
        if ($request->file('img')) {
            unlink(public_path('/upload/post/') . $post->main_image);
            unlink(public_path('/upload/post/') . $post->thumb_image);
            unlink(public_path('/upload/post/') . $post->list_image);
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'post_main' . $post->id . '.' . $extension;
            $thumb_image = 'post_thumb' . $post->id . '.' . $extension;
            $list_image = 'post_list' . $post->id . '.' . $extension;
            Image::make($file)->resize(653, 569)->save(public_path('/upload/post/') . $main_image);
            Image::make($file)->resize(360, 309)->save(public_path('/upload/post/') . $thumb_image);
            Image::make($file)->resize(122, 122)->save(public_path('/upload/post/') . $list_image);
            $post->main_image = $main_image;
            $post->thumb_image = $thumb_image;
            $post->list_image = $list_image;
        }

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->category_id = $request->category_id;
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path('/upload/post/') . $post->main_image);
        unlink(public_path('/upload/post/') . $post->thumb_image);
        unlink(public_path('/upload/post/') . $post->list_image);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post Delelet Successfully');
    }

    /**
     * Status Update the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post_status($id)
    {
        $post = Post::find($id);
        $status = $post->status;
        if ($status === 1) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }
        $post->update();

        return back()->with('success', 'Post status updated Successfully');
    }

    public function hot_news($id)
    {
        $post = Post::find($id);
        $hot_news = $post->hot_news;
        if ($hot_news === 1) {
            $post->hot_news = 0;
        } else {
            $post->hot_news = 1;
        }
        $post->update();

        return back()->with('success', 'Post Hot News Set  Successfully');
    }
}
