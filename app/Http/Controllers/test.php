<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    public function index(){
        $data=CRUD::all();
        $data=CRUD::paginate(10);
        $data=Post::latest()->paginate(10);
    }
    public function store(Request $requset){
        $validatedata=$requset->validate([
            'title'=>'required',
            'description'=>'required|min:10',
        ],[
            'description.min'=>'minimum 1- character',
        ]);

        $data=post::create($validationdata);
        return response()->json(['message'=>'success','data'=>$data],201);
    }
    public function edit($id){
        $data=post::find($id);
        return response()->json(['data'=>$data]);
    } 
    public function delete($id){
        $data=post::find($id)->delete();
    }

    public function update(Request $request,$id){
        $validatedata=$request->validate([]);
        $data=post::findOrFail($id);
        $data->update($validatedata);
        return response()->json(['message'=>'success']);
    }



}
