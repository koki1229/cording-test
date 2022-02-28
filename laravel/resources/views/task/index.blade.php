@extends('layouts.taskapp')
<style>
    .pagination { font-size:10pt; }
    .pagination li { display:inline-block }
</style>
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
            <th>@sortablelink('created_at', '登録日時')</th>
            <th>操作</th>
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
                <input type="button" onclick="location.href='/laravel/public/task/edit?id={{$item->id}}'" value="編集">
                <form action="/laravel/public/task/delete?id={{$item->id}}" method="POST">
                    @csrf
                    <input type="submit" value="削除" class="btn-dell">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $items->appends(request()->query())->links() }}
@endsection


@section('footer')
copyright 2022 Koki Katsumoto.
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