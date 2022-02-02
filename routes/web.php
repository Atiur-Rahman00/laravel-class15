<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RoleController,HomeController,CategoryController};
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//all user roles routes starts
Route::get('/role',[RoleController::class, 'addform']);
Route::post('/role/add',[RoleController::class, 'storerole']);
//all user roles routes ends

//all category routes starts
Route::prefix('category')->group(function(){
    Route::get('/create',[CategoryController::class, 'create']);
    Route::post('/store',[CategoryController::class, 'store']);
    Route::get('/index',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/delete/{id}',[CategoryController::class, 'destroy']);
    Route::get('/trashed',[CategoryController::class, 'deletedcategory'])->name('category.trashed');
    Route::get('/restore/{id}',[CategoryController::class, 'categoryrestore'])->name('category.restore');
    Route::get('/vanish/{id}',[CategoryController::class, 'categoryvanish'])->name('category.force');
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update',[CategoryController::class, 'update'])->name('category.update');
});
//all category routes ends

//middleware user and admin route starts
Route::get('/user/dashboard',function(){
    return "User deshboard pore kaj korbo";
});
//middleware user and admin route ends
