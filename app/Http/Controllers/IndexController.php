<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $allPosts = DB::table('posts_models')->select()->get();



        return Inertia::render('Index', [
            "posts" => $allPosts
        ]);
    }
}
