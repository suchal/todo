<?php

namespace App\Http\Controllers;

use App\TodoList;
use App\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index(){
        $lists = \Auth::user()->lists;
        $shared_lists = \Auth::user()->shared_lists;
        return response()->json($lists->merge($shared_lists));
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
        $list = TodoList::find($request->get('list_id'));
        if($list->user_id == \Auth::user()->id || $list->viewers()->where('user_id', \Auth::user()->id)->count()){
            $list->update([
                'name' => $request->get('name')
            ]);
            return response()->json(['status'=>'success']);
        }else{
            return response()->json(['status'=>'error', 'msg'=>'Unauthorized']);
        }
    }

    public function destroy(TodoList $list, Request $request){
        if($list->user_id == \Auth::user()->id){
            $list->delete();
            return response()->json(['status'=>'success']);
        }elseif($list->viewers()->where('user_id', \Auth::user()->id)->count()){
            $list->viewers()->detach(\Auth::user()->id);
            return response()->json(['status'=>'success']);
        }
        return response()->json(['status'=>'error', 'msg'=>'Unauthorized']);
    }

    public function show(TodoList $list, Request $request){
        \Gate::authorize('crud-owner', $list);
        return $list->items;
    }

    public function share(TodoList $list, Request $request){
        $this->validate($request, ['user_email'=>'required|email']);
        $user = User::where('email', $request->get('user_email'))->first();
        if(!$user){
            return response()->json(['status'=>'error', 'msg'=>'Couldn\'t find a user with this email.']);
        }
        $list->viewers()->attach($user->id);
        return response()->json(['status'=>'success']);
    }
}
