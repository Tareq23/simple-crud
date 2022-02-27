<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }
    public function create(){
        return view('category.create');
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
