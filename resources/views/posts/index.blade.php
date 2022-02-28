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
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="form-inline d-flex justify-content-between">
                                <label for="category_filter">Category Filter</label>
                                <select id="category_filter" class="form-control" name="category">
                                    <option value="">select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ (Request::query('category') && Request::query('category') == $category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <label for="search_keyword">&nbsp;&nbsp;</label>
                                <input type="text" id="search_keyword" name="keyword" class="form-control" placeholder="Enter Keyword"/><span>&nbsp;</span>
                                <button type="submit" onclick="search_post()" class="btn btn-primary mb-2">search</button>
                                <a href="" class="btn btn-success">clear</a>
                            </form>
                       </div>
                       <div class="table-reponsive">
                       <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">created by</th>
                                <th scope="col">category</th>
                                <th scope="col">Total Comments
                                    <a href="#"><i class="fas fa-sort-down"></i></a>
                                    <a href="#"><i class="fas fa-sort-up"></i></a>
                                    <a href="#"><i class="fas fa-sort"></i></a>
                                </th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($posts as $post)

                                    <tr>
                                        <th>{{$post->id}}</th>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->user_name}}</td>
                                        <td>{{$post->category_name}}</td>
                                        <td>
                                            <a class="btn btn-primary">view</a>
                                            <a class="btn btn-success">edit</a>
                                            <a class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>

                                @endforeach
                                <!-- <tr>
                                    <th>1</th>
                                    <td>post title one</td>
                                    <td>tareq</td>
                                    <td>science</td>
                                    <td>
                                        <a class="btn btn-primary">view</a>
                                        <a class="btn btn-success">edit</a>
                                        <a class="btn btn-danger">delete</a>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                       </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection


@section('script')


    <script type="text/javascript">

        var query = <?php echo json_encode((object) Request::query()); ?>;
        console.log(query);

        function search_post()
        {
            Object.assign(query,{category:$("#category_filter").val});
            Object.assign(query,{search:$("#search_keyword").val});
            window.location.href="{{route('posts.index')}}?"+$.param(query);
        }

    </script>


@endsection