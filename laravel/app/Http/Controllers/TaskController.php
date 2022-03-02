<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){

        //where条件格納（デフォルトはログインユーザのデータのみ）
        $where = array(['user_id', '=', Auth::id()]);
        //完了済みにチェック有りの場合条件追加
        if((!isset($request->search_status_flg)) || $request->search_status_flg != 1){
            $where[] = ['status_flg', '=', 0];
        }

        //タイトル検索が有りの場合where追加
        if(isset($request->search_name) && $request->search_name){
            $where[] = ['name', 'like', '%' . $request->search_name . '%'];
        }

        //データ取得
        $items = Task::sortable()
            //絞り込み条件
            ->where($where)
            //デフォルトはID降順
            ->orderBy('id', 'desc')
            //10件づつ表示
            ->paginate(10);

        return view('task.index', ['items' => $items, 'request' => $request]);
    }

    public function add(Request $request){
        return view('task.add');
    }

    public function create(Request $request){
        //バリデーション実行
        $this->validate($request, Task::$rules);
        //Taskインスタンスの作成
        $task = new Task;
        //保存する値
        $form = $request->all();
        //不要データの削除
        unset($form['_token']);
        //登録ユーザID取得
        $form['user_id'] = Auth::id();
        //値セット保存　
        $task->fill($form)->save();
        //一覧画面へ遷移
        return redirect('/task');
    }

    public function view(Request $request){
        $task = Task::find($request->id);
        return view('task.view', ['task' => $task]);
    }

    public function edit(Request $request){
        //データ取得
        $task = Task::find($request->id);
        return view('task.edit', ['form' => $task]);
    }

    public function update(Request $request){
        //バリデーション実行
        $this->validate($request, Task::$rules);
        //Taskインスタンスの作成
        $task = Task::find($request->id);
        //保存する値
        $form = $request->all();
        unset($form['_token']);
        //値セット保存　
        $task->fill($form)->save();
        //一覧画面へ遷移
        return redirect('/task');
    }

    public function delete(Request $request){
        //削除実行
        Task::find($request->id)->delete();
        return redirect('/task');
    }
    
}
