@extends('layouts.taskapp')

@section('title', 'Add')

@section('menubar')
    @parent
    編集ページ
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
    <form action="/laravel/public/task/edit" method="post">
        <table>
            @csrf
            <input type="hidden" name="id" value="{{$form->id}}"
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="name" value="{{$form->name}}"></td>
            </tr>
            <tr>
                <th>本文</th>
                <td><textarea name="body">{{$form->body}}</textarea></td>
            </tr>
            <tr>
                <th>ステータス</th>
                <td class="d-flex">
                    <div>
                        <input type="radio" name="status_flg" id="status_flg_0" value="0" {{ $form->status_flg == '0' ? 'checked' : '' }}>
                        <label for="status_flg_0">未対応　</label>
                    </div>
                    <div>
                        <input type="radio" name="status_flg" id="status_flg_1" value="1" {{ $form->status_flg == '1' ? 'checked' : '' }}>
                        <label for="status_flg_1">完了</label>
                    </div>
                </td>
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