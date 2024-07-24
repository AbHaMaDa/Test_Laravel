@extends('../layouts/app')
@section('Link_css', '/design/posts/create/create.css')
@section('title','create')





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



    <form action={{route('posts.store')}} method="POST" style="width:80%;margin:auto;" enctype="multipart/form-data">
        @csrf  {{--  like a input hidden hold a unique id    --}}
        <div class="form_check form_check_inline">
            <label class="form-label" for="exampleInputPost">title</label>
            <input type="text" name="title"  placeholder="title" class="form-control" id="exampleInputPost"  value={{old('title')}} >
        </div>
        <div class="form_check form_check_inline">
            <labe class="form-label" for="exampleInputPost">description</label>
            <textarea name="description"  class="form-control" id="exampleInputPost" rows="3">{{old('description')}}</textarea>
        </div>
        <div class=" mb-3 form_check form_check_inline">
            <label class="form-label" for="exampleInputPost">post creator</label>
            <select name="post_creator"    class="form-control" id="exampleInputPost"  >
                @foreach ($users as $user)

                <option value={{$user['id']}}>{{$user['name']}}</option>

                @endforeach

            </select>
            <br>

            <select name="post_category"    class="form-control" id="exampleInputPost"  >
                @foreach ($categories as $category)

                <option value={{$category['id']}}>{{$category['name']}}</option>

                @endforeach

            </select>
            <br>

            <input class="btn btn-success" type="submit" value="add">


        </div>

    </form>
@endsection
