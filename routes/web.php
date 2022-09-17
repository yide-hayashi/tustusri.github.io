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

Route::get('/managerpage',"ManagePage@manageIndex");
Route::post("/managerpage/{id}","Api\HomePageController@updateImg");
Route::put("/managerpage/{id}","Api\HomePageController@update");

