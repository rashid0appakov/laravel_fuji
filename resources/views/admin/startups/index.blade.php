@extends('layouts.admin')

@section('content')
    <a href="{{route('admin.startups.create')}}" class="btn btn-sm btn-outline-secondary">Add startup</a>
    <hr>
    {{$startups->links()}}
    <table class="table">
        <caption>Startups</caption>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        @foreach($startups as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                <a href="{{route('admin.startups.edit', $item->id)}}" class="btn btn-info btn-sm"><i class="material-icons">edit</i></a>
                <form action="{{route('admin.startups.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$startups->links()}}
@stop