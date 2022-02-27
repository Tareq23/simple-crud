@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>Posts</div>
                            <div><a class="btn btn-success" href="{{route('posts.create')}}">create post</a></div>
                        </div>
                    </div>
                    <!-- <img class="card-img-top" src="" alt="Card image cap"> -->
                    <div class="card-body">
                       <div class="mb-2">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label for="category_title">Title</label>
                                    <input type="text" id="category_title" name="name" class="form-control" placeholder="enter name"/>
                                </div>
                            </form>
                       </div>
                      
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection