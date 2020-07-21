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


// Route::get('/home', function () {
//     return redirect('customer');
// });



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
Route::get('/rate_fixing', 'CustomerRateFixingController@index');
Route::post('/rate_fixing', 'CustomerRateFixingController@store')->name('Addcustomerrate');
Route::get('/rate_fixing', 'CustomerRateFixingController@show');
Route::get('/rate_edit/{id}', 'CustomerRateFixingController@edit');
Route::put('/customerrateupdate/{id}', 'CustomerRateFixingController@update');
Route::get('/rate_fixing/{id}', 'CustomerRateFixingController@destroy');
Route::get('/customer_rate_fixingproduct/{id}', 'CustomerRateFixingController@productdestroy');

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
Route::get('bank-detail_edit/{id}' , 'Bank_Details_Controller@edit');
Route::put('bank-details-update/{id}' , 'Bank_Details_Controller@update');
Route::get('bank-details/{id}' , 'Bank_Details_Controller@destroy');

//Bank DEtails

Route::get('transaction_details' ,'Bank_Details_Controller@transaction_details');
Route::post('transaction_details' ,'Bank_Details_Controller@suppliertransfer');
Route::post('debit' ,'Bank_Details_Controller@debit')->name('adddebit');;
Route::get('debit','Bank_Details_Controller@debitindex');

//Bill page
Route::get('/purchase' ,'PurchasesController@index');
Route::post('/purchase' ,'PurchasesController@store')->name('addpurchase');
// Route::post('/bill' ,'BillDataController@store')->name('Addbill');
Route::get('/findproductname' ,'PurchasesController@findproductname');
Route::get('/findproductprice' ,'PurchasesController@findproductprice');
// Route::get('/bill' ,'PurchasesController@inserprice');

//Supplier Report
Route::get('report','ReportController@index');
Route::get('month_and_week_report','ReportController@month_and_week');
Route::get('consolidation','ReportController@consolreport');
Route::get('consolidation','ReportController@consolreportproduct');
Route::get('consolidation','SuppliersController@suppliers');
Route::post('/report','PurchasesController@filtered_list')->name('filtered_list');
Route::post('/month_and_week_report','PurchasesController@filtered_month_and_week')->name('filtered_month_and_week');
Route::get('/billviewedit/{id}','PurchasesController@billview');
Route::get('/pendingamount','PurchasesController@pendingamount');


//Customer Report
Route::get('sales_day_report','ReportController@customer_dayreport');
Route::get('sales_consolidation','ReportController@salesconsolreport');
Route::post('/sales_day_report','SalesController@filtersalesdaywisereport')->name('filtersalesdaywisereport');
Route::post('/sales_month_and_week_report','SalesController@filtermonthandweekreport')->name('filtermonthandweekreport');
Route::get('sales_month_and_week_report','ReportController@customer_month_and_week_repot');
Route::get('/salesbillviewedit/{id}','SalesController@salesbillview');

Route::get('sales_consolidation','ReportController@salesconsolproduct');

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

//Cash On Delivery
Route::get('purchase_cod' , 'Purchase_PaymentController@purchasescodindex');
Route::get('sales_cod' , 'Purchase_PaymentController@salescodindex');


//Stock Details
Route::get('stock_details','StockController@index');
// Route::get('stock_details','StockController@allproduct');
Route::get('stock_details','StockController@sumofpurchasstock');
// Route::get('stock_details','StockController@sumofsalesstock');

//Purchase payment report
Route::get('purchasepayment_day_report','Purchasepaymentreport_Controller@index');
Route::get('purchasepayment_month_report','Purchasepaymentreport_Controller@purchasepaymentmonthandweek');
Route::post('purchasepayment_day_report','Purchasepaymentreport_Controller@filtered_purchasepaymentdayreport');
Route::get('/purchasepayment/{id}','Purchasepaymentreport_Controller@purchasebillview');
Route::post('/purchasepayment_month_report','Purchasepaymentreport_Controller@filtered_purchasepaymentmonthreport');

//Sales payment report
Route::get('salespayment_day_report','Salespaymentreport_Controller@index');
Route::get('salespayment_month_report','Salespaymentreport_Controller@salespaymentmonthandweek');
Route::post('salespayment_day_report','Salespaymentreport_Controller@filtered_salespaymentdayreport');
Route::get('/salespayment/{id}','Salespaymentreport_Controller@salesbillview');
Route::post('/salespayment_month_report','Salespaymentreport_Controller@filtered_salespaymentmonthreport');

//Profit Or Loss 
Route::get('profit-or-loss','ProfitorLoss_Controller@index');
Route::post('profit-or-loss','ProfitorLoss_Controller@store')->name('addprofit');
Route::get('profit-or-loss','ProfitorLoss_Controller@show');


//api

Route::get('/api/stockalert/{id}', 'SalesController@customerstockalert');