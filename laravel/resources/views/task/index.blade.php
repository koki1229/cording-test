@extends('layouts.taskapp')

@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th>タイトル</th>
            <th>ステータス</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->status_flg}}</td>
        </tr>
        @endforeach
    </table>
@endsection

@section('footer')
copyright 2022 Koki Katsumoto.
@endsection