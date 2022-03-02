@extends('layouts.taskapp')

@section('title', 'タスク新規作成')

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
        <form action="/public/task/add" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">タイトル　<span class="badge badge-danger">必須</span></label>
                <input type="text" class="form-control" name="name" required="required" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label class="form-label">本文</label>
                <textarea class="form-control" name="body" style="height: 100px">{{old('body')}}</textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">保存</button>
            </div>
        </form>
    </div>
</div>
@endsection
