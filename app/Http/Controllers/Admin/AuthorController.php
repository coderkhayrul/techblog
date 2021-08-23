<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Authors";
        $authors = User::where("type", 2)->get();
        return view('admin.author.list', compact('page_name', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Author Create";
        $roles = Role::pluck('name', 'id');
        return view('admin.author.create', compact('page_name', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // $this->validate(
        //     $request,
        //     [
        //         'name' => 'required',
        //         'email' => 'required|email|unique:user.email',
        //         'password' => 'required|min:6',
        //         'roles' => 'required|array',
        //     ]
        // );

        $author = new User();
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->type = 2;
        $author->save();

        foreach ($request->roles as $value) {
            $author->attachRole($value);
        }

        return redirect()->route('author.index')->with('success', "User Created Successfully");
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
        $page_name = "Author Edit";
        $author = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view("admin.author.edit", compact('page_name', 'author', 'roles'));
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
        $author = User::findOrFail($id);
        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->type = 2;
        $author->update();

        DB::table('role_user')->where('user_id', $id)->delete();

        foreach ($request->roles as $value) {
            $author->attachRole($value);
        }
        return back()->with('success', "Author Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = User::findOrFail($id)->delete();
        return back()->with('success', "Author Delete Successfully");
    }
}
