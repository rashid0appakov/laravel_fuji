@extends('layouts.admin')

@section('content')
     <a href="{{route('admin.slides.create')}}" class="btn btn-sm btn-outline-secondary">Add slide</a>
    <hr>
    {{$slides->links()}}
    <table class="table">
        <caption>Slides</caption>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        @foreach($slides as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{route('admin.slides.edit', $item->id)}}" class="btn btn-sm btn-info"><i class="material-icons">edit</i></a>
                <form action="{{route('admin.slides.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$slides->links()}}
@stop