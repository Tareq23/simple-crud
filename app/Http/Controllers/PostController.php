<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }
    public function create(){
        return view('posts.create');
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
