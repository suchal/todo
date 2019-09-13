<?php

namespace App\Http\Controllers;

use App\Item;
use App\TodoList;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);

        return $list->items();
    }
    public function store(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        
        return $list->items()->create([
            'user_id' => \Auth::user()->id,
            'content' => $request->get('content')
        ]);
    }
    public function update(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        $this->validate($request, ['item_id'=>'required', 'content'=>'required']);
        Item::where('id', $request->get('item_id'))->update([
            'content' => $request->get('content')
        ]);
        return response()->json(['status'=>'success']);
    }

    public function toggle(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        $this->validate($request, ['item_id'=>'required']);
        $item = Item::find($request->get('item_id'));
        $item->update([
            'is_done' => !$item->is_done
        ]);
        return response()->json(['status'=>'success']);
    }
    public function destroy(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        Item::where('id', $request->get('item_id'))->delete();
        return response()->json(['status'=>'success']);
    }
}
