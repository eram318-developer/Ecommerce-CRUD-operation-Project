<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Categorycontroller extends Controller
{
    //

    public function view_category(){

      $cat=Category::latest()->paginate(10);
      return view('category',compact('cat'));//DB theke info gula form e show kore
    }

    public function add_category(Request $request){
        $request->validate(
              [
                'name'=>'required',
                'code'=>'required',
                'des' =>'required',
              ],
              [
                'name.required'=>'Name is required',
                'name.unique'=>'Category Already Exists',
                'code.required'=>'Code is required',
                'des.required'=>'Description is required',
              ]
        );

        //DB related code

        $category= new Category();
        $category->category_name=$request->name;
        $category->category_code=$request->code;
        $category->category_description=$request->des;
        $category->save();


        return response()->json([
           'status'=>'success',
      ]);
    }

    //update function

    public function updatecategory(Request $request){

      //return $request->all();
      dd($request->all());
      $request->validate(
        [
          'up_name'=>'required',
          'up_code'=>'required',
          'up_des' =>'required',
        ],
        [
          'up_name.required'=>'Name is required',
          'up_name.unique'=>'Category Already Exists',
          'up_code.required'=>'Code is required',
          'up_des.required'=>'Description is required',
        ]
  );
          //DB updated related code
        Category::where('id',$request->up_id)->update([
            'category_name'=>$request->up_name,
            'category_code'=>$request->up_code,
            'category_description'=>$request->up_des,
        ]);

        return response()->json([
            'status'=>'success',
        ]);
    }

    public function deletecategory(Request $request){
      Category::find($request->product_id)->delete();

      return response()->json([
        'status'=>'success',
      ]);
    }
}
