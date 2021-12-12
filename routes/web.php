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

/* 
Route::get('/', function () {
    return view('welcome');
});
 */


Route::get('/','genarelViewControll@index');





//---------------Login signUp------------------------------//

Route::get('/create_new_account','loginRegisterControll@create');
Route::post('/create_new_account','loginRegisterControll@store');


Route::get('/verify','loginRegisterControll@verify');
Route::post('/verify','loginRegisterControll@verifyCode');
Route::get('/resent','loginRegisterControll@resent');


Route::get('/login','loginRegisterControll@index');
Route::post('/login','loginRegisterControll@loginUser');


Route::get('/logout','loginRegisterControll@logout');




//------------------ Profile ---------------------------//
Route::get('/profile/{code}','profileControll@index');
Route::post('/create_post','publicPostControll@store');


//------------------ Edite Profile ---------------------------//
Route::get('/profile/edit/{code}','profileControll@edit');
Route::post('/profile/edit/{code}','profileControll@update');




//------------------ Post ---------------------------//
Route::get('/post/{code}','publicPostControll@show');
Route::get('/post/','publicPostControll@index');



//------------------ Contact ---------------------------//
Route::get('/contact','contactControll@index');
Route::post('/contact','contactControll@store');





//------------------ Bloge ---------------------------//
Route::get('/add_blog','admin\blogControll@create');
Route::post('/add_blog','admin\blogControll@store');

Route::get('/details/{code}','admin\blogControll@details');




//------------------ comment ---------------------------//
Route::post('/comment','commentControll@store');




//------------------join blood doner ---------------------------//
Route::get('/join-blood-doner','bloodControll@index');
Route::post('/join-blood-doner','bloodControll@store');
//					blood doner address
Route::get('/districts','bloodControll@districts');
Route::get('/json-thana','bloodControll@thana');

//                 blood doner view
Route::get('/view-doner','admin\admin@viewDoner');
Route::get('/searchBloodDoner','admin\admin@searchBloodDoner');




//------------------Apply for blood ---------------------------//
Route::get('/apply-blood','bloodControll@apply');
Route::post('/apply-blood','bloodControll@storeApply');
//					blood doner address
Route::get('/districts','bloodControll@districts');
Route::get('/json-thana','bloodControll@thana');

//                 blood doner view
Route::get('/view-applyer','admin\admin@viewApplyer');
Route::get('/searchBloodApplyer','admin\admin@searchBloodApplyer');








//------------------ Admin  ---------------------------//
Route::get('/dashboard','admin\admin@index');



















