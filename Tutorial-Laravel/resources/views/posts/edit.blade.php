@extends('../layouts/app')
@section('title', 'edit')
@section('Link_css','/design/posts/edit/edit.css')



@section('main')

@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)

        <li>{{$error}}</li>

        @endforeach
    </ul>
</div>

@endif


    <form action={{route('posts.update',$post['id'])}} method="POST" style="width:80%;margin:auto;" enctype="multipart/form-data">
        @csrf  {{--  like a input hidden hold a unique id    --}}
        @method('PUT')
        <div class="form_check form_check_inline">
            <label class="form-label" for="exampleInputPost">title</label>
            <input type="text" name="title"  placeholder="title" class="form-control" id="exampleInputPost" value={{$post['title']}} >
        </div>
        <div class="form_check form_check_inline">
            <labe class="form-label" for="exampleInputPost">description</label>
            <textarea    name="description"  class="form-control" id="exampleInputPost" rows="3" >{{$post['description']}}</textarea>
        </div>
        <div class=" mb-3 form_check form_check_inline">
            <label class="form-label" for="exampleInputPost">post creator</label>
            <select name="post_creator"    class="form-control" id="exampleInputPost"  >
                @foreach ($users as $user)

                <option @selected($user['id'] == $post['user_id']) <?php // echo  $user['id'] == $post['user_id']? 'selected' : null ?> value={{$user['id']}}>{{$user['name']}}</option >

                @endforeach


            </select>
            <br>

            <select name="post_category"    class="form-control" id="exampleInputPost"  >
                @foreach ($categories as $category)

                <option   @selected($category['id'] ==$post['category_id'] )    value={{$category['id']}}>{{$category['name']}}</option>

                @endforeach

            </select>
            <br>

            <input class="btn btn-success" type="submit" value="update">


        </div>

    </form>

@endsection

