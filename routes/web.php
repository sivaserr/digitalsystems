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



//Change password function
Route::get('/change-password','Auth\ChangePasswordController@index')->name('password.change');
Route::post('/change-password','Auth\ChangePasswordController@changePassword')->name('password.update');


// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/page', 'PageController@index');

// Route::resource('/post' , 'PostController');

// Route::get('/students' , 'studentController@index');
// Route::post('/students','studentController@store')->name('Addstudent');
// Route::get('/studentspage','studentController@show');
// Route::get('/editstudentprofile/{id}' ,'studentController@edit');




//Product CRUD
Route::get('/products','ProductController@index');
Route::post('/products','ProductController@store')->name('Addproduct');
Route::get('/products','ProductController@show');
Route::get('/product_edit/{id}','ProductController@edit');
Route::put('/product_update/{id}','ProductController@update');
Route::get('/product/{id}','ProductController@destroy');

//Product Group CRUD
Route::get('/product_group','ProductGroupController@index');
Route::post('/product_group','ProductGroupController@store')->name('Addproductgroup');
Route::get('/product_group','ProductGroupController@show');
Route::get('/product_group_edit/{id}','ProductGroupController@edit');
Route::put('/product_group_update/{id}','ProductGroupController@update');
Route::get('/product_group/{id}','ProductGroupController@destroy');

//Unit CRUD
Route::get('/unit' , 'UnitController@index');
Route::post('/unit' , 'UnitController@store')->name('Addunit');
Route::get('/unit' , 'UnitController@show');
Route::get('/unit_edit/{id}','UnitController@edit');
Route::put('/unit_update/{id}','UnitController@update');
Route::get('unit/{id}','UnitController@destroy');


//Customer CRUD
Route::get('/customer','CustomerController@index');
Route::post('/customer','CustomerController@store')->name('Addcustomer');
Route::get('/customer','CustomerController@show');
Route::get('/customer_edit/{id}','CustomerController@edit');
Route::put('/customerupdate/{id}','CustomerController@update');
Route::get('/customer/{id}','CustomerController@destroy');
// Route::get('/customer/{id}','CustomerController@active');

//Customer Rate Fixing CRUD
Route::get('/customer_rate_fixing', 'CustomerRateFixingController@index');
Route::post('/customer_rate_fixing', 'CustomerRateFixingController@store')->name('Addcustomerrate');
Route::get('/customer_rate_fixing', 'CustomerRateFixingController@show');
Route::get('/customer_rate_edit/{id}', 'CustomerRateFixingController@edit');
Route::put('/customerrateupdate/{id}', 'CustomerRateFixingController@update');
Route::get('/customer_rate_fixing/{id}', 'CustomerRateFixingController@destroy');

//Suppliers CRUD

Route::get('/supplier' ,'SuppliersController@index');
Route::post('/supplier' ,'SuppliersController@store')->name('Addsupplier');
Route::get('/supplier','SuppliersController@show');
Route::get('/supplier_edit/{id}','SuppliersController@edit');
Route::put('/supplierupdate/{id}','SuppliersController@update');
Route::get('/supplier/{id}','SuppliersController@destroy');


//trip CRUD

Route::get('/trips','TripController@index');
Route::post('/trips','TripController@store')->name('addtrip');
Route::get('/trips','TripController@show');
Route::get('/trip_edit/{id}','TripController@edit');
Route::put('/trip_update/{id}','TripController@update');
Route::get('/trips/{id}','TripController@destroy');

Route::get('/set_trips','TripController@settripindex');
Route::get('/set_trips','TripController@settrip');
Route::get('/change_trip/{id}','TripController@changetrip');
Route::put('/set_trip/{id}','TripController@tripupdate');


//Bank CRUD
Route::get('bank-details' , 'Bank_Details_Controller@index');
Route::post('bank-details','Bank_Details_Controller@store')->name('addbank');
Route::get('bank-details' , 'Bank_Details_Controller@show');
Route::get('bank-details/{id}' , 'Bank_Details_Controller@edit');
Route::put('bank-details-update/{id}' , 'Bank_Details_Controller@update');
Route::get('bank-details/{id}' , 'Bank_Details_Controller@destroy');



//Bill page
Route::get('/bill' ,'BillController@index');
Route::post('/bill' ,'BillController@store')->name('Addbill');
// Route::post('/bill' ,'BillDataController@store')->name('Addbill');
Route::get('/findproductname' ,'BillController@findproductname');
Route::get('/findproductprice' ,'BillController@findproductprice');
// Route::get('/bill' ,'BillController@inserprice');

//Supplier Report
Route::get('report','ReportController@index');
Route::get('month_and_week_report','ReportController@month_and_week');
Route::get('consolidation','ReportController@consolreport');
Route::get('consolidation','ReportController@consolreportproduct');
Route::get('consolidation','SuppliersController@suppliers');
Route::post('/report','BillController@filtered_list')->name('filtered_list');
Route::post('/month_and_week_report','BillController@filtered_month_and_week')->name('filtered_month_and_week');
Route::get('/billviewedit/{id}','BillController@billview');
Route::get('/pendingamount','BillController@pendingamount');


//Customer Report
Route::get('sales_day_report','ReportController@customer_dayreport');
Route::post('/sales_day_report','SalesController@filtersalesdaywisereport')->name('filtersalesdaywisereport');
Route::post('/sales_month_and_week_report','SalesController@filtermonthandweekreport')->name('filtermonthandweekreport');
Route::get('sales_month_and_week_report','ReportController@customer_month_and_week_repot');
Route::get('/salesbillviewedit/{id}','SalesController@salesbillview');



//Opening balances

Route::get('/openingbalance','SuppliersController@findopeningbalance');




//Sales entry 

Route::get('/sales', 'SalesController@index');
Route::post('/sales', 'SalesController@store')->name('Addsales');
Route::get('customerbillpending' , 'SalesController@customerbillpending');
Route::get('/salesfindproductprice' ,'SalesController@salesfindproductprice');


//Purchase Payment Entry

Route::get('payment-for-purchase' , 'Purchase_PaymentController@index');
// Route::get('payment-for-purchase' , 'Purchase_PaymentController@showsuppliers');
Route::post('/payment-for-purchase','Purchase_PaymentController@getbilldata')->name('getbilldata');
Route::get('/payment-for-purchase/{id}', 'Purchase_PaymentController@showsuppliers');
// Route::get('payment-for-purchase' , 'Purchase_PaymentController@suppliersbill');

Route::post('/payment-for-purchase','Purchase_PaymentController@store');


//Sales Payment Entry

Route::get('payment-for-sales' , 'Sales_PaymentController@index');
Route::post('/payment-for-sales','Sales_PaymentController@store');
