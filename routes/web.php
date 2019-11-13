<?php

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
    return redirect(route('login'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Auth::routes();


Route::get('/home', function () {
    return redirect('customer');
});

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/page', 'PageController@index');

// Route::resource('/post' , 'PostController');

// Route::get('/students' , 'studentController@index');
// Route::post('/students','studentController@store')->name('Addstudent');
// Route::get('/studentspage','studentController@show');
// Route::get('/editstudentprofile/{id}' ,'studentController@edit');




//Product page
Route::get('/products','ProductController@index');
Route::post('/products','ProductController@store')->name('Addproduct');
Route::get('/products','ProductController@show');
Route::get('/product_edit/{id}','ProductController@edit');
Route::put('/product_update/{id}','ProductController@update');
Route::get('/product/{id}','ProductController@destroy');

//Product Group page
Route::get('/product_group','ProductGroupController@index');
Route::post('/product_group','ProductGroupController@store')->name('Addproductgroup');
Route::get('/product_group','ProductGroupController@show');
Route::get('/product_group_edit/{id}','ProductGroupController@edit');
Route::put('/product_group_update/{id}','ProductGroupController@update');
Route::get('/product_group/{id}','ProductGroupController@destroy');



//Customer page
Route::get('/customer','CustomerController@index');
Route::post('/customer','CustomerController@store')->name('Addcustomer');
Route::get('/customer','CustomerController@show');
Route::get('/customer_edit/{id}','CustomerController@edit');
Route::put('/customerupdate/{id}','CustomerController@update');
Route::get('/customer/{id}','CustomerController@destroy');

//Bill page
Route::get('/bill' ,'BillController@index');



