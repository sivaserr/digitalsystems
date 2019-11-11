<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/person' , function(){
//  $person =[
//      'first-name' => 'sean',
//      'last-name' => 'Pooley',
//  ];

//  return $person;
// });


Route::get('/customer','CustomerController@jsondata');
Route::post('/customer','CustomerController@jsoncreate');
Route::get('/customer/{id}','CustomerController@jsondatawidthid');
Route::put('/customer/update/{id}','CustomerController@jsonupdate');
Route::delete('/customer/delete/{id}','CustomerController@jsondelete');
