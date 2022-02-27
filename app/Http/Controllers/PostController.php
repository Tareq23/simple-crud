<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function create(){
        $query_1 = DB::table('categories')->get();
        $query_2 = DB::table('tags')->get();

        return view('posts.create',['categories'=>$query_1,'tags'=>$query_2]);
    }
    public function store(){

    }
    public function edit(){

    }
    public function show(){

    }
    public function update(){

    }
    public function destroy(){

    }
}
