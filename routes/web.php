<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\Categorycontroller;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[TemplateController::class,'index']);
Route::get('/about',[TemplateController::class,'about']);
Route::get('/products',[TemplateController::class,'products'])->name('products');
Route::get('/pdetails',[TemplateController::class,'pdetails']);
Route::get('/blog',[TemplateController::class,'blog']);
Route::get('/bdetail',[TemplateController::class,'bdetail']);
Route::get('/cart',[TemplateController::class,'cart']);
Route::get('/checkout',[TemplateController::class,'checkout']);
Route::get('/contact',[TemplateController::class,'contact']);
Route::get('/welcome',[TemplateController::class,'admin']);
Route::get('/view_product',[TemplateController::class,'view_product']);
Route::post('/add_product',[TemplateController::class,'add_product'])->name('add_product');
Route::get('/add',[TemplateController::class,'add']);
Route::get('/show_product',[TemplateController::class,'show_product']);
Route::get('/delete_product/{id}',[TemplateController::class,'delete_product']);
Route::get('/edit_product/{id}',[TemplateController::class,'edit_product']);
Route::post('/update_product/{id}',[TemplateController::class,'update_product'])->name('update_product');
Route::get('/view_category',[Categorycontroller::class,'view_category']);
Route::post('/add_category',[Categorycontroller::class,'add_category']);
Route::post('/updatecategory',[Categorycontroller::class,'updatecategory'])->name('updatecategory');
Route::post('/deletecategory',[Categorycontroller::class,'deletecategory'])->name('deletecategory');

