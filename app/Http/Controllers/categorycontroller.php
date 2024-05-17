<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\rolltable;;

class categorycontroller extends Controller
{
    function category(){
        return view("category");
    }
    public function store(Request $request){
    $request->validate([
        'name' => 'required|max:255',
    ]);
    $data = new rolltable();
    $data->name =  $request->input('name');
    $data->save();
    return redirect('categorytable');
    }
    public function categorytable() {
        $data = rolltable::all();
        $data = compact('data');
        return view('categorytable')->with($data);
    }
   public function catedit($id){
       $data = rolltable::find($id);
       return view('category', compact('data'));
    }
    public function catupdate(Request $request, $id){
        
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $data = rolltable::find($id);
        $data->name = $request->input('name');
        $data->save();
        return redirect('categorytable');
    }

}   