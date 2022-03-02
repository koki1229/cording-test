@extends('layouts.taskapp')

@section('title', 'タスク閲覧')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="">
            <a class="btn btn-primary" href="/public/task/" role="button">タスク一覧</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th style="min-width:100px;">ID</th>
                <td>{{$task->id}}</td>
            </tr>
            <tr>
                <th>タイトル</th>
                <td>{{$task->name}}</td>
            </tr>
            <tr>
                <th>本文</th>
                <td>{!! nl2br(e($task->body)) !!}</td>
            </tr>
            <tr>
                <th>ステータス</th>
                <td>
                @if ($task->status_flg == 0)
                    未対応
                @elseif($task->status_flg == 1)
                    完了
                @endif
                </td>
            </tr>
            <tr>
                <th>登録日時</th>
                <td>{{$task->created_at}}</td>
            </tr>
            <tr>
                <th>更新日時</th>
                <td>{{$task->updated_at}}</td>
            </tr>
        </table>
    </div>
    <div class="card-footer d-flex">
        <div>
            <form action="/public/task/delete?id={{$task->id}}" method="POST" style="margin:0px;">
                @csrf
                <input class="btn btn-danger btn-dell" type="submit" value="削除" class="btn-dell">
            </form>
        </div>
        <div class="ml-auto">
            <a class="btn btn-secondary" href="/public/task/edit?id={{$task->id}}" role="button">編集</a>
            <a class="btn btn-outline-secondary" href="/public/task/" role="button">キャンセル</a>
        </div>
    </div>
</div>
@endsection

@section('script')
  <script>
  $(function(){
    $(".btn-dell").click(function(){
        if(confirm("本当に削除しますか？")){
        //そのままsubmit（削除）
        }else{
        //cancel
        return false;
        }
    });
  });
  </script>
@endsection