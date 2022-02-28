<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $req)
    {
        $category_query = DB::table('categories')->get();
        $post_query = DB::table('posts')
                            ->join('users','users.id', '=', 'posts.user_id')
                            ->join('categories','categories.id','=','posts.category_id')
                            ->select('posts.*','categories.name as category_name','users.name as user_name')
                            ->where('posts.user_id',Auth::id());
                            // ->get();
        if($req->category)
        {
            $post_query->where('categories.id','=',$req->category);
        }
        if(isset($req->keyword))
        {
            $post_query->where('posts.title','LIKE',"%{$req->keyword}%");
        }
        $posts = $post_query->get();
        return view('posts.index',['posts'=>$posts,'categories'=>$category_query]);



        // string search without spaces

        /*
            $string = 'john doe';

            // split on 1+ whitespace & ignore empty
            $searchValue = preg_split('/\s+/',$string,-1,PREG_SPLIT_NO_EMPTY);

            $users = User::where(function($q) use $searchValue){
                foreach($searchValues as $value)
                {
                    $q->orWhere('name','like',"%{$value}%");
                }
            })->get();
        */
    }



    public function create(){
        $query_1 = DB::table('categories')->get();
        $query_2 = DB::table('tags')->get();

        return view('posts.create',['categories'=>$query_1,'tags'=>$query_2]);
    }
    public function store(Request $req){

        $req->validate([
            'title' => 'required|max:200',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'category' => 'required',
            'tags' => 'required|array',
        ],[
            'category.required' => 'Please select category',
            'tags.required' => 'Please select atlest one tag',
            'image.required' => 'Please select image',

        ]);
        // return redirect()->back();

        if($req->hasFile('image'))
        {
            $image = $req->file('image');

            $image_name = time().'.'.$image->extension();
            $image->move(public_path('post_image'),$image);
       
       
            $post_id = DB::table('posts')->insertGetId([
                'title' => $req->input('title'),
                'description' => $req->input('description'),
                'image' => 'post_image/'.$image_name,
                'category_id' => $req->input('category'),
                'user_id' => Auth::id()
            ]);
            if($post_id)
            {
                $tags = $req->input('tags');
                foreach($tags as $tag)
                {
                    DB::table('post_tag')->insert(['post_id'=>$post_id,'tag_id'=>$tag]);
                }
                return redirect()->route('posts.index')->with('success','post successfully created');
            }
            return redirect()->route('posts.create')->with('failed','post creating failed');
        }


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
