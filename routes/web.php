<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/',"index@indexPage");

Route::post("/managerpage/upload","Api\HomePageController@updateImg");
Route::put("/{id}/managerpage","Api\HomePageController@update");
Route::group(["prefix"=>"managerpage"],function()
{
    Route::get('/',"ManagePage@manageIndex");



    Route::put("/store","Api\protfolio@store");
    Route::post("/create","Api\protfolio@create");

    Route::put("/storeContent","Api\protfolio@storeContent");
    Route::post("/createContent","Api\protfolio@createContentPage");
    Route::delete("/del/{pjn}","Api\protfolio@destroy");

    Route::get('/UpdateProject',"Api\protfolio@show");
    Route::get('/createProject',"Api\protfolio@creatshow");
});



