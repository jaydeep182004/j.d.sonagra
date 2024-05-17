<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\rolltable;
use Illuminate\Support\Facades\DB;



class FormController extends Controller {

    public function form() {
        $categories = rolltable::all(); 
        // print_r($categories);
        return view("form",compact('categories'));
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            'image' => 'required',
        ]);
    
        $data = new Form();
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->state = $request['state'];
        $data->gender = $request['gender'];
        $checkbox = $request['hobbies'];
        $data->hobbies = implode(',', $checkbox);
        $data->roll= $request['category'];
    
    
        $image = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $ext = $file->getClientOriginalExtension();
                $image_name = time() . '_' . rand(1000, 9999) . '.' . $ext;
                $file->move('storage/image', $image_name);
                $image[] = $image_name;
            }
        }
    
        $data->image = json_encode($image);
        $data->save();
        return redirect('show');
    }
    
public function show() {
    $data = Form::with('hasOneRelationship')->get();
    // echo"<pre>";
    // print_r($data);
        // $data = DB::table('form')
        //     ->join('rolltable', 'rolltable.id', '=', 'form.roll')
        //     ->select('form.*', 'rolltable.name as rolldata')
        //     ->get();
        $data = compact('data');
        return view('show')->with($data);
    }    

    public function delete($id) {
        Form::destroy($id);
        return back();
    }
           
    public function edit($id) {
        $data = Form::find($id);
        $categories = rolltable::all(); 
        return view('update', compact('data','categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'state' => 'required',
            'gender' => 'required',
            'hobbies' => 'required',
            // 'image' => 'required',
        ]);
    
        $data = Form::find($id);
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->state = $request['state'];
        $data->gender = $request['gender'];
        $checkbox = $request['hobbies'];
        $data->hobbies = implode(',', $checkbox);
        $data->roll= $request['category'];
    
        $image = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $ext = $file->getClientOriginalExtension();
                $image_name = time() . '_' . rand(1000, 9999) . '.' . $ext;
                $file->move('storage/image', $image_name);
                $image[] = $image_name;
            }
        }
    
        $data->image =json_encode($image);
        $data->save();
       return redirect('show');
    }
    public function deleteimage($id,$image){
            $user = form::find($id);
            $images = json_decode($user->image);
            $index = array_search($image, $images);
            if ($index !== false) {
                array_splice($images, $index, 1);
                $user->image = json_encode($images);
                $user->save();
             form::destroy('storage/image/' . $image);
                return back();
            }  
    }
    
    public function trash(){
        $data=Form::onlyTrashed()->get();
        $data=compact('data');
        return view('form-trash')->with($data);
    }

    public function restore($id) {
        $del=  Form::withTrashed()->find($id);
        if($del){
          $del->restore();
        }
          return back();
      }
    public function forcedelete($id) {
      $del=  Form::withTrashed()->find($id);
      if($del){
        $del->forceDelete();
      }
        return back();
    }
}


