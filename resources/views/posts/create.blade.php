@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Create Post</div>
                            <div><a class="btn btn-success" href="{{route('posts.index')}}">back</a></div>
                        </div>
                    </div>
                    <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
                    <div class="card-body">
                       <div class="mb-2">
                            @if (session('failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('failed') }}
                                </div>
                            @endif
                            <form class="form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="post_title">Title</label>
                                    <input type="text" id="post_title" value="{{old('title')}}" name="title" class="form-control" placeholder="enter title"/>
                                    @if($errors->any('title'))
                                        <span class="text-danger">{{$errors->first('title')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="post_category">category</label>
                                    <select id="post_category" name="category" class="form-control">
                                    <option value="">Select Category</option>
                                       @if(count($categories))
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{old('category')&& old('category')==$category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                       @endif
                                    </select>
                                    @if($errors->any('category'))
                                        <span class="text-danger">{{$errors->first('category')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="post_image">Image</label>
                                    <input type="file" id="post_image" name="image" class="form-control" placeholder="post_image"/>
                                    @if($errors->any('image'))
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="post_description">Description</label>
                                    <textarea type="text"  id="post_description" name="description" class="form-control text-left" placeholder="Post Description">
                                    {{old('description')}}
                                    </textarea>
                                    @if($errors->any('description'))
                                        <span class="text-danger">{{$errors->first('description')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="post_tag">Tag</label>
                                    <select id="post_tag" name="tags[]" class="form-control" multiple>
                                        <option value="">select tags</option>
                                        @if(count($tags))
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                       @endif
                                    </select>
                                    @if($errors->any('tags'))
                                        <span class="text-danger">{{$errors->first('tags')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class = "float-right btn btn-primary" type="submit" value="post"/>
                                </div>
                            </form>
                       </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('script')

    <script>

        
        $("#post_tag").select2({
            placeholder: "select tags",
            allowClear: true
        });

    </script>

@endsection