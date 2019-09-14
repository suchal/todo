<?php

namespace App;

use App\User;
use App\TodoList;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = ['user_id', 'list_id', 'content', 'is_done'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function list(){
        return $this->belongsTo(TodoList::class, 'list_id', 'id');
    }
}