<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request){
        $items = Task::sortable()
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('task.index', ['items' => $items]);
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
        unset($form['_token']);
        // $form['user_id'] = Auth::id();
        $form['user_id'] = 1;
        //値セット保存　
        $task->fill($form)->save();
        //一覧画面へ遷移
        return redirect('/task');
    }

    public function edit(Request $request){
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
        Task::find($request->id)->delete();
        return redirect('/task');
    }
    
}
