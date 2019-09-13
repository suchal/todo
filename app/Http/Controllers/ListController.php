<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
        return \Auth::user()->lists;
    }

    public function store(Request $request){
        $this->validate($request, ['name'=>'required']);

        return TodoList::create([
            'user_id' => \Auth::user()->id,
            'name' => $request->get('name')
        ]);
    }

    public function update(Request $request){
        $this->validate($request, ['name'=>'required']);

        TodoList::where('id', $request->list_id)->where('user_id', \Auth::user()->id)->update([
            'name' => $request->get('name')
        ]);
        return response()->json(['status'=>'success']);
    }

    public function destroy(Request $request){
        TodoList::where('id', $request->get('list_id'))->where('user_id', \Auth::user()->id)->delete();
        return response()->json(['status'=>'success']);
    }

    public function show(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        return $list->items();
    }
}
