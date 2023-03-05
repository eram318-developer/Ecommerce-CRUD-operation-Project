<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class TemplateController extends Controller
{
    //
    public function index(){
        return view('frontend.home');
    }
    public function about(){
        return view('frontend.about');
    }
    public function products(){
        $product=Product::all();
        return view('frontend.products',compact('product'));
    }
    public function pdetails(){
        return view('frontend.pdetails');
    }
    public function blog(){
        return view('frontend.blog');
    }
    public function bdetail(){
        return view('frontend.blog_details');
    }
    public function cart(){
        return view('frontend.shopcart');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function admin(){
        return view('welcome');
    }
    public function view_product(){
        $category= Category::all();
        return view('product',compact('category'));
    }
    public function add_product(Request $request){
          //dd($request->all());
          $product=new Product();
          $product->title=$request->title;
          $product->description=$request->description;
          $product->price=$request->price;
          $product->quantity=$request->quantity;
          $product->discount_price=$request->dprice;
          $product->category_id=$request->category_id;
          $image=$request->image;
          $imagename=time().'.'.$image->getClientOriginalExtension();
          $request->image->move('product',$imagename);
          $product->image=$imagename;

          $product->save();
          return redirect()->back();
        // dd($request->input());
    }


    public function show_product(){
        $product=Product::all();
        return view('show_product',compact('product'));
    }

    public function delete_product($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return redirect()->back()->with('success','Data is deleted successfully');
    }

    public function edit_product($id){
        $product=Product::where('id',$id)->first();
        return view('edit',compact('product'));
    }
    public function update_product(Request $request,$id){
        $product=Product::find($id);
        $product->name=$request->title;
        $product->description=$request->description;
        $product->catagory=$request->category;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dprice;

        $image=$request->image;
        if($image)
    {

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;

    }
        $product->save();
        return redirect()->back()->with('success','Data is updated successfully');
    }

}
