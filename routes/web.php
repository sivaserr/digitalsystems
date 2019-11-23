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

//Unit Page
Route::get('/unit' , 'UnitController@index');
Route::post('/unit' , 'UnitController@store')->name('Addunit');
Route::get('/unit' , 'UnitController@show');
Route::get('/unit_edit/{id}','UnitController@edit');
Route::put('/unit_update/{id}','UnitController@update');
Route::get('unit/{id}','UnitController@destroy');


//Customer page
Route::get('/customer','CustomerController@index');
Route::post('/customer','CustomerController@store')->name('Addcustomer');
Route::get('/customer','CustomerController@show');
Route::get('/customer_edit/{id}','CustomerController@edit');
Route::put('/customerupdate/{id}','CustomerController@update');
Route::get('/customer/{id}','CustomerController@destroy');
// Route::get('/customer/{id}','CustomerController@active');


//Suppliers page

Route::get('/supplier' ,'SuppliersController@index');
Route::post('/supplier' ,'SuppliersController@store')->name('Addsupplier');
Route::get('/supplier','SuppliersController@show');
Route::get('/supplier_edit/{id}','SuppliersController@edit');
Route::put('/supplierupdate/{id}','SuppliersController@update');
Route::get('/supplier/{id}','SuppliersController@destroy');


//Bill page
Route::get('/bill' ,'BillController@index');
Route::post('/bill' ,'BillController@store')->name('Addbill');
Route::get('/findproductname' ,'BillController@findproductname');
Route::get('/findproductprice' ,'BillController@findproductprice');



