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
    return view('login');
});


// Route::get('/register', function () {
//     return view('register');
// });

Route::get("/login","userController@index");
Route::post("/show","userController@login");
Route::get("/register","userController@create");
Route::post("/user_create","userController@store");
Route::get("/logout","userController@logout");


Route::get("/catogery","catogeryController@index");
Route::get("/delete/{catogeryId}","catogeryController@destroy");
Route::get("/edit/{catogeryId}","catogeryController@edit");
Route::post("/update/{catogeryId}","catogeryController@update");
Route::post("/create","catogeryController@store");
Route::get('/add', 'catogeryController@create');

Route::get("/product","productController@index");
Route::get("/p_delete/{productId}","productController@destroy");
Route::get("/p_edit/{productId}","productController@edit");
Route::post("/p_update/{productId}","productController@update");
Route::post("/p_create","productController@store");
Route::get('/p_add', 'productController@create');






Route::get("/expense","expenseController@index");
Route::get("/e_delete/{productId}","expenseController@destroy");
Route::get("/e_edit/{productId}","expenseController@edit");
Route::post("/e_update/{productId}","expenseController@update");
Route::post("/e_create","expenseController@store");
Route::get('/e_add', 'expenseController@create');



Route::get("/monthly_expense","monthlyExpenseController@index");
Route::get("/me_delete/{productId}","monthlyExpenseController@destroy");
Route::get("/me_edit/{productId}","monthlyExpenseController@edit");
Route::post("/me_update/{productId}","monthlyExpenseController@update");
Route::post("/me_create","monthlyExpenseController@store");
Route::get('/me_add', 'monthlyExpenseController@create');


Route::get("/stock","stockController@index");
Route::get("/s_delete/{productId}","stockController@destroy");
Route::get("/s_edit/{productId}","stockController@edit");
Route::post("/s_update/{productId}","stockController@update");
Route::post("/s_create","stockController@store");
Route::get('/s_add', 'stockController@create');




