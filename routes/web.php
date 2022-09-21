<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api;
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

Route::group(["prefix"=>"managerpage"],function()
{
    Route::get('/',"ManagePage@manageIndex");
    Route::put("/updateTitle/{id}","Api\HomePageController@update");


    Route::put("/store","Api\protfolio@store");
    Route::post("/create","Api\protfolio@create");

    Route::put("/storeContent","Api\protfolio@storeContent");
    Route::post("/createContent","Api\protfolio@createContentPage");
    Route::delete("/del/{pjn}","Api\protfolio@destroy");

    Route::get('/UpdateProject',"Api\protfolio@show");
    Route::get('/createProject',"Api\protfolio@creatshow");

    Route::put("/aboutme/update","Api\aboutmeController@update");
    Route::get("/aboutme","Api\aboutmeController@showAboutMeContent");

    Route::post("/aboutme/create","Api\aboutmeController@create");
    Route::put("/aboutme/updateHistory/{id}","Api\aboutmeController@updateHistory");
    Route::get("/aboutme/showAboutMeBeUpdatedContent/{id}","Api\aboutmeController@showAboutMeBeUpdatedContent");
    Route::delete("/aboutme/del/{id}","Api\aboutmeController@destroy");

    Route::get("/Contact/show","Api\contactController@show");
    Route::put("/Contact/update","Api\contactController@update");
});

Route::group(["prefix"=>"user"],function(){ //同一層的可以寫在一起
    Route::group(["prefix"=>"auth"],function(){
        Route::get("/sign-up","UserAuthController@signUpPage");
        Route::post("/sign-up","UserAuthController@signUpProcess");

        Route::get("/sign-out","UserAuthController@signOut");

        Route::get("/login","UserAuthController@loginpage");
        Route::post("/login","UserAuthController@loginpagePost");
    });
});

