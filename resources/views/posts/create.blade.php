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
                            <form class="form">
                                <div class="form-group">
                                    <label for="post_title">Title</label>
                                    <input type="text" id="post_title" name="title" class="form-control" placeholder="enter title"/>
                                </div>
                                <div class="form-group">
                                    <label for="post_category">category</label>
                                    <select id="post_category" name="category" class="form-control">
                                       @if(count($categories))
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                       @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="post_image">Image</label>
                                    <input type="file" id="post_image" name="image" class="form-control" placeholder="post_image"/>
                                </div>
                                <div class="form-group">
                                    <label for="post_description">Description</label>
                                    <textarea type="text"  id="post_description" name="description" class="form-control" placeholder="Post Description"></textarea>
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