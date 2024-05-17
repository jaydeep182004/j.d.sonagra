<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\categorycontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/form',[App\Http\Controllers\formController::class,'form']);
// Route::get('/update',[App\Http\Controllers\formcontroller::class,'up']);   
Route::post('/form',[App\Http\Controllers\formcontroller::class,'register']);   
route::get('show', [formController::class,'show']);
route::get('delete/{id}', [formController::class,'delete']);
route::get('edit/{id}', [formController::class,'edit']);
Route::post('update/{id}',[App\Http\Controllers\formcontroller::class,'update']);   
Route::get('delete_image/{id}/{image}', [formController::class, 'deleteimage']);

Route::get('/category', [categorycontroller::class,'category']);
Route::post('/category', [categorycontroller::class,'store']);
Route::get('categorytable', [categorycontroller::class,'categorytable']);
Route::get('catedit/{id}', [categorycontroller::class, 'catedit'])->name('catedit');
Route::post('cat_update/{id}',[categorycontroller::class,'catupdate']);

route::get('/trash', [formController::class,'trash']);
route::get('restore/{id}', [formController::class,'restore']);
route::get('forcedelete/{id}', [formController::class,'forcedelete']);





