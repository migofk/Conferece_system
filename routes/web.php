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



Auth::routes();
Route::get('/', 'frontend\HomeController@index')->name('home');
Route::get('/home', 'frontend\HomeController@index')->name('home');

Route::get('/inquire_now', 'frontend\HomeController@inquire_now');

Route::post('/inquire_now', 'frontend\HomeController@store');

Route::get('/package/{name}', 'frontend\HomeController@packagePage');




////// admin routes/////
Route::group(['middleware' => ['role:admin']], function () {
    //
//attendants
Route::resource('/adminLink/attendants', 'attendantController');
Route::get('/adminLink/reviewattendants', 'attendantController@reviewattendants');
Route::get('/adminLink/rejectedattendants', 'attendantController@rejectedattendants');


//Tickets
Route::get('/adminLink/tickets/{attendantID}', 'attendantController@get_attendant_Ticket');

//about
Route::resource('/adminLink/about', 'aboutController');
//contact
Route::resource('/adminLink/contact', 'contactController');
//intro
Route::resource('/adminLink/intro', 'introController');
//dashboard
Route::get('/adminLink', 'HomeController@admin_dashboard');
//slider
Route::resource('/adminLink/slider', 'sliderController');
//company
Route::resource('/adminLink/companies', 'companyController');
Route::get('/adminLink/reviewcompanies', 'companyController@reviewcompanies');

Route::get('/adminLink/createCompany/{id}', 'companyController@createCompany');

Route::get('/adminLink/viewproduct/{companyID}', 'productController@index_company')->name('product.index_company');
Route::get('/adminLink/viewevent/{companyID}', 'eventController@index_company')->name('event.index_company');

//products
Route::resource('/adminLink/products', 'productController');

//event
Route::resource('/adminLink/events', 'eventController');
//users
Route::resource('/adminLink/users', 'userController');
//setting
Route::get('/updateZero', 'HomeController@updateZero');
Route::get('/get/{tableName}', 'settingController@getPage');
Route::post('/createactInput', 'settingController@createActivityInput');
Route::post('/editactInput', 'settingController@editActivityInput');
Route::post('/deleteactInput', 'settingController@deleteActivityInput');
//role & permissions
Route::post('/createRole', 'userController@createRole');
Route::post('/editRole', 'userController@editRole');
Route::post('/deleteRole', 'userController@deleteRole');
Route::post('/permissionRole', 'userController@permissionRole');
Route::get('/getRole/{id}', 'userController@getRole');
//admins
Route::get('/user', 'userController@index');
Route::get('/user/{id}', 'userController@profile');
Route::post('/user_add', 'userController@store');
Route::post('/user_edit/{id}', 'userController@edit');
Route::post('/userX/searchNumber','userController@searchNumber');

Route::get('/setupRoles', 'userController@setupRoles');
Route::post('/permissionUser','userController@permissionUser');
/////End admin routes//////
});
