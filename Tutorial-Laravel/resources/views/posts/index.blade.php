@extends('../layouts/app')
@section('Link_css','./design/posts/index/index.css')
@section('title', 'index')




@section('main')

    <div class="d-flex  p-2 justify-content-between align-items-center">

        <button class="create btn btn-success "><a href={{route('posts.create')}}>create post</a></button>

        <form class="d-flex  w-50 " action={{route('posts.search')}}  method="GET">
            @csrf
            <input name="search" class="form-control" type="text" placeholder="search ..." value={{old('search')}}>
            <button class="input-group-text"   type="submit">search</button>
        </form>

    </div>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">title</th>
                <th scope="col">posted by</th>
                <th scope="col">category</th>
                <th scope="col">created at</th>
                <th scope="col" >actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($allposts as $post)




            <tr>
                <td>{{$id++}}</td>
                <td> {{$post['title']}}</td>
                <td>{{$post->user["name"]}}</td>   {{-- user here is a function in Post model that make Post model belongs to User model --}}
                <td>{{$post->category['name']}}</td>
                <td>{{$post['created_at']->format('Y-m-d ')}}</td>
                <td class="actions">
                    <button class="btn btn-info"><a href= {{route('posts.show',$post['id'])}} >view</a></button>
                    <button class="btn btn-primary"><a href={{route('posts.edit',$post['id'])}} >edit</a></button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$post['id']}}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$post['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{$post['id']}}">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <span style="color: black"> are u sure ??</span>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action={{route('posts.destroy',$post['id'])}} method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger" type="submit">yes!</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>

@endsection


