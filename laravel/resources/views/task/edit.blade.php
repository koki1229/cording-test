@extends('layouts.taskapp')

@section('title', 'タスク編集')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="">
            <a class="btn btn-primary" href="/public/task/" role="button">タスク一覧</a>
        </div>
    </div>
    <div class="card-body">
        @if (count($errors) > 0)
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="/public/task/edit" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$form->id}}">
            <div class="mb-3">
                <label class="form-label">タイトル　<span class="badge badge-danger">必須</span></label>
                <input type="text" class="form-control" name="name" required="required" value="{{$form->name}}">
            </div>
            <div class="mb-3">
                <label class="form-label">本文</label>
                <textarea class="form-control" name="body" style="height: 100px">{{$form->body}}</textarea>
            </div>
            <div class="mb-3">
            <p class="control-label">ステータス　<span class="badge badge-danger">必須</span></p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_flg" id="status_flg_0" value="0" {{ $form->status_flg == '0' ? 'checked' : '' }} >
                    <label class="form-check-label" for="status_flg_0">未対応</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status_flg" id="status_flg_1" value="1" {{ $form->status_flg == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_flg_1">完了</label>
                </div>
            </div>
            
    
            <div class="mb-3">
                <button type="submit" class="btn btn-success">保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
