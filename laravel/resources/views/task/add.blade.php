@extends('layouts.taskapp')

@section('title', 'Add')

@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/laravel/public/task/add" method="post">
        <table>
            @csrf
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="name" value="{{old('name')}}"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td><textarea name="body" value="{{old('body')}}"></textarea></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="保存"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
copyright 2022 Koki Katsumoto.
@endsection