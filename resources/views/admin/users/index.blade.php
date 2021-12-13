@extends('layouts.admin')

@section('content')
    {{$users->links()}}
    <table class="table">
        <caption>Пользователи</caption>
        <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Действия</th>
        </tr>
        @foreach($users as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <a href="{{route('admin.users.edit', $item->id)}}" class="btn btn-sm btn-info"><i class="material-icons">edit</i></a>
                <form action="{{route('admin.users.destroy', $item->id)}}" class="d-inline-block confirmed" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-sm btn-danger"><i class="material-icons">delete</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$users->links()}}
@stop