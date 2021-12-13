@extends('layouts.admin')

@section('content')
    <a href="{{route('admin.posts.create')}}" class="btn btn-sm btn-outline-secondary">Add post</a>
    <hr>
    {{$posts->links()}}
    <table class="table">
        <caption>Posts</caption>
        <tr>
            <th>Title</th>
            <th>Comments</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->comments_count}}</td>
            <td>
                <a href="{{route('admin.posts.edit', $item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                <form action="{{route('admin.posts.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$posts->links()}}
@stop