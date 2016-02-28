<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Todo;
use Session;
class TodoController extends Controller
{
    //
    public function index(Request $request)
    {

    
    $todos = Todo::paginate(5);	
    $todox = $todos->currentPage();	
    	if($request->ajax()){
    		return response()->json([view('todo.list')->with('todos',$todos)->render()]);
    	}
    	return view ('todo.index')->with('todos',$todos);
    }

    public function store(Request $request)
    {
   
    $this->validate($request, [
        'title' => 'required|unique:todos|min:2',
        'description' => 'required'
    ]);

    	$todo = new Todo;
    	$todo->title = $request->get('title');
    	$todo->description = $request->get('description');
    	$todo->save();

        return "$todo->title is Successfully Created";
    
    }

    public function destroy(Request $request)
    {
    	$id = $request->get('id');
    	$todo = Todo::find($id);
    	$todo->delete();

        return "$todo->title is Successfully Deleted";
    }

    public function view(Request $request)
    {
    	$id = $request->get('id');
    	$todo = Todo::find($id);

    	return view ('todo.view')->with('todo',$todo);
    }

    public function edit(Request $request)
    {
    	$id = $request->get('id');
    	$todo = Todo::find($id);

    	return view ('todo.edit')->with('todo',$todo);
    }    

    public function update(Request $request)
    {
    $this->validate($request, [
        'title' => 'required|unique:todos|min:2',
        'description' => 'required'
    ]);
    
    	$id = $request->get("id");
    	$todo = Todo::find($id);
    	$todo->title = $request->get('title');
    	$todo->description = $request->get('description');
    	$todo->save();

        return "$todo->title is Successfully Updated";
    }

    public function search(Request $request)
    {
    	$keywords = $request->get('keywords');
    	$result = Todo::where('title','LIKE','%'.$keywords.'%')->get();
    	//$result = Todo::like('title',$keywords)->get();
    	return view ('todo.search')->with('todos',$result);
    	
    }

    public function ajaxTest(Request $request)
    {
    	return response()->json(['message' => 'Ajax Request Successful']);
    }


}
