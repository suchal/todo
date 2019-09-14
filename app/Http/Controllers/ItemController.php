<?php

namespace App\Http\Controllers;

use App\Item;
use App\TodoList;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(TodoList $list, Request $request){
        \Gate::authorize('viewable', $list);

        return $list->items;
    }
    public function store(Request $request){
        $this->validate($request, ['content'=>'required', 'list_id'=>'required']);
        $list = TodoList::find($request->get('list_id'));
        if(!$list){
            return response()->json(['status'=>'error']);
        }
        \Gate::authorize('viewable', $list);
        
        $item = $list->items()->create([
            'user_id' => \Auth::user()->id,
            'content' => $request->get('content')
        ]);
        return response()->json(['status'=>'success']);
    }
    public function update(TodoList $list, Request $request){
        \Gate::authorize('viewable', $list);
        $this->validate($request, ['item_id'=>'required', 'content'=>'required']);
        Item::where('id', $request->get('item_id'))->update([
            'content' => $request->get('content')
        ]);
        return response()->json(['status'=>'success']);
    }

    public function toggle(TodoList $list, Item $item, Request $request){
        \Gate::authorize('viewable', $list);
        \Log::info($item);
        $item->update([
            'is_done' => !$item->is_done
        ]);
        return response()->json(['status'=>'success']);
    }
    
    public function destroy(TodoList $list, Item $item, Request $request){
        \Gate::authorize('viewable', $list);
        $item->delete();
        return response()->json(['status'=>'success']);
    }
}
