<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Task extends Model
{
    //値は用意しないDBが自動入力
    protected $guarded = array('id');

    //バリデーションルール
    public static $rules = array(
        'name' => 'required|max:64',
        'user_id' => 'integer',
    );

    use Sortable;
    public $sortable = ['created_at'];
}
