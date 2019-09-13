<?php

namespace App;

use App\Item;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    public $table = "lists";

    public $fillable = ['user_id', 'name']; 

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(Item::class, 'list_id', 'id');
    }

}
