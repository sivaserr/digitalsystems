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

//Customer
Route::get('/customer','CustomerController@jsondata');
Route::post('/customer','CustomerController@jsoncreate');
Route::get('/customer/{id}','CustomerController@jsondatawidthid');
Route::put('/customer/update/{id}','CustomerController@jsonupdate');
Route::delete('/customer/delete/{id}','CustomerController@jsondelete');


//customer rate fixing api
Route::get('/customerratefixing/{id}','CustomerController@getcustomerratefixing');


//suppliers
Route::get('/supplier/{id}', 'SuppliersController@findsupplierdata');

//Product api
Route::get('/product/{id}','ProductController@findprocductdata');


//Unit api
Route::get('unit/{id}', 'UnitController@findunitdata');


//Bill api
Route::get('bill/{id}','BillController@billdata');


//Sales api
Route::get('sales/{id}','SalesController@customerpending');


Route::get('suppliersbill','Purchase_PaymentController@suppliersbill');

Route::get('payment-for-purchase/{id}','Purchase_PaymentController@showbills');

Route::get('payment-for-purchase/getsuppliersbill/{id}','Purchase_PaymentController@getsuppliersbill');



//Sales payment api

Route::get('payment-for-sales/getcustomersbill/{id}','Sales_PaymentController@getcustomerbill');
Route::get('payment-for-sales/{id}','Sales_PaymentController@showsalesbills');


// Route::get('suppliers', 'SuppliersController@suppliers');
// Route::get('supplierdatas','BillDataController@supplierdatas');