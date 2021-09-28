<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts_models')->select()->where('user_id', '=', Auth::id())->get();

        return Inertia::render('Home', ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('CreatePost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = "";

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $path = $request->file('image')->storeAs('imagesPosts', $request->title . "." . $request->file('image')->extension());
        }

        DB::table('posts_models')->insert(
            ['image' => $path,
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => Auth::id(),
            "created_at" => Carbon::now()
        ]);

        return redirect('home');
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
        $post = DB::table('posts_models')->where('id', $id)->get();

        return Inertia::render('ManagePost', [
            "post" => $post

        ]);
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

        $path = "";

        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            $path = $request->file('image')->storeAs('imagesPosts', $request->title . "." . $request->file('image')->extension());
        }

        DB::table('posts_models')->where('id', $request->id)->update([
            'image' => $path,
            "title" => $request->title,
            "description" => $request->description,
            "updated_at" => Carbon::now()
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('posts_models')->delete($id);


        return redirect('home');
    }
}
