@extends('../layouts/app')
@section('Link_css','/design/posts/show/show.css')
@section('title', 'show')





@section('main')

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">description</th>
            <th scope="col">category</th>
            <th scope="col">created at</th>

        </tr>
    </thead>
    <tbody>


    <tr>
        <td>{{$singelPost['id']}}</td>
        <td> {{$singelPost['title']}}</td>
        <td>{{$singelPost->user['name']}}</td>
        <td>{{$singelPost['description']}}</td>
        <td>{{$singelPost->category['name']}}</td>
        <td>{{$singelPost['created_at']}}</td>


    </tr>

    </tbody>
</table>


@endsection





