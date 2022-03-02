@extends('layouts.taskapp')
<style>
    .pagination { font-size:10pt; }
    .pagination li { display:inline-block }
</style>
@section('title', 'タスク一覧')

@section('content')
<form class="row g-3" action="/public/task" method="get">
    <div class="col-12">
        <label class="form-label">タイトル</label>
        <input type="text" class="form-control" name="search_name" value="{{ $request->search_name }}">
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="search_status_flg" id="flexCheckDefault" {{ $request->search_status_flg == 1 ?'checked':'' }} >
            <label class="form-check-label" for="flexCheckDefault">
            完了済を表示
            </label>
        </div>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">検索</button>
    </div>
</form>

<div class="card">
    <div class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/public/task/add" role="button">新規作成</a>
        </div>
    </div>
    <div class="card-body">
        {{ $items->appends(request()->query())->links() }}
        <table class="table table-hover">
            <tr>
                <th scope="col">タイトル</th>
                <th scope="col" style="min-width:100px;">ステータス</th>
                <th scope="col" style="min-width:100px;">@sortablelink('created_at', '登録日時')</th>
                <th scope="col" style="min-width:180px;" >操作</th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>
                    @if ($item->status_flg == 0)
                    未対応
                    @elseif($item->status_flg == 1)
                    完了
                    @endif
                </td>
                <td>{{$item->created_at}}</td>
                <td>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <form action="/public/task/delete?id={{$item->id}}" method="POST" style="margin:0px;">
                                <a class="btn btn-outline-warning btn-sm" href="/public/task/view?id={{$item->id}}" role="button">閲覧</a>
                                <a class="btn btn-outline-primary btn-sm" href="/public/task/edit?id={{$item->id}}" role="button">編集</a>
                                @csrf
                                <input class="btn btn-outline-danger btn-dell btn-sm" type="submit" value="削除" class="btn-dell">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $items->appends(request()->query())->links() }}
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
