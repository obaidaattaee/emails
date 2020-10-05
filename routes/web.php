<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix("admin")->namespace("Admin")->middleware(["auth","role:admin",'permissions'])->group(function(){


    Route::get("/users/{id}/status","UserController@status")->name('user.status');
    Route::get("/users/{id}/permissions","UserController@permissions")->name('permissions');
    Route::post("/users/{id}/permissions","UserController@postPermissions")->name('permissions-post');
    Route::resource("users",'UserController');
    Route::get("/users/{id}/delete","UserController@destroy")->name('delete-user');
    Route::get("/change-password",'UserController@changePassword')->name("change-password");
    Route::put("/change-password",'UserController@postChangePassword')->name("post-change-password");



    Route::get("no-access","HomeController@noAccess")->name("admin.no-access");
    Route::get("/","HomeController@index")->name("admin.home");

});
