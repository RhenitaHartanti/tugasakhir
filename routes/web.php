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
    return view('landingpage_beranda');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/landingpage_package', 'HomeController@landingpage_package');
Route::get('/landingpage_formpackage', 'HomeController@landingpage_formpackage');
Route::get('/landingpage_formpackage2', 'HomeController@landingpage_formpackage2');
Route::get('/landingpage_daftar', 'HomeController@landingpage_daftar');
Route::get('/landingpage_beranda', 'HomeController@landingpage_beranda');
Route::get('/landingpage_galeri', 'HomeController@landingpage_galeri');
Route::get('/landingpage_login', 'HomeController@landingpage_login');
Route::resource('/setting', 'CustomerController');

Route::resource('admin_listpackage','PackageController');
Route::resource('admin_listcustomer','HomeController@admin_listcustomer');
Route::get('/admin_detailpayment','HomeController@admin_detailpayment');
Route::get('/admin_detailreservation','HomeController@admin_detailreservation');
// Route::get('/admin_listpackage','HomeController@admin_listpackage');
Route::get('/admin_listreservation','HomeController@admin_listreservation');
Route::resource('/admin_setting','AdminController');
Route::put('/admin_setting/{id}','AdminController@update')->name('admin.update');
Route::get('/admin_dashboard','HomeController@admin_dashboard');
Route::get('/admin_listpackage/delete/{id_package}','PackageController@destroy')->name('package.delete');
Route::put('/admin_listpackage/{id_package}','PackageController@update')->name('package.update');

Route::get('landingpage_package',function(){
	$package = DB::table('packages')->get();
	return view('landingpage_package', ['package' => $package]);
});
Route::get('admin_listcustomer',function(){
	$customer = DB::table('users')->get();
	return view('admin_listcustomer', ['customer' => $customer]);
});


