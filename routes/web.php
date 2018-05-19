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
    return redirect('landingpage_beranda');
});

Auth::routes();
//LANDINGPAGE
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/landingpage_package', 'LandingPackageController');
Route::get('/landingpage_formpackage/{id}', 'HomeController@landingpage_formpackage');
Route::get('/landingpage_daftar', 'HomeController@landingpage_daftar');
Route::resource('/landingpage_beranda', 'LandingBerandaController');
Route::get('/landingpage_galeri', 'HomeController@landingpage_galeri');
Route::get('/landingpage_login', 'HomeController@landingpage_login');
Route::resource('/landingpage_setting', 'OrderCustomerController');
Route::resource('/landingpage_profil', 'ProfilUserController');
Route::post('/resetPassword', 'Auth\LoginController@resetPassword'); 
Route::get('/forgetPassword',function(){
	return view('forgetPassword');
});
// Route::put('/landingpage_profil/','ProfilUserController@changePassword')->name('changePassword');
Route::get('/landingpage_formbayar/{id}', 'OrderCustomerController@loadFormBayar');
Route::post('/uploadBukti', 'OrderCustomerController@upload');
// Route::put('/landingpage_profil2/{id}','Controller@update')->name('customer.update');


//ADMID
Route::middleware('auth')->group(function(){
Route::resource('admin_listcustomer','CustomerController');
Route::get('/admin_detailpayment','HomeController@admin_detailpayment');
Route::get('/admin_detailreservation','HomeController@admin_detailreservation');
Route::resource('/admin_profil','AdminController')->except(['update']);
Route::resource('/admin_listreservation','ListReservationController');
Route::put('/admin_setting/{id}','AdminController@update')->name('admin.update');
Route::get('/admin_dashboard','OrdersController@index');
Route::resource('admin_listpackage','PackageController');
Route::get('admin_history','HomeController@admin_history');
Route::get('/admin_listpackage/delete/{id_package}','PackageController@destroy')->name('package.delete');
Route::put('/admin_listpackage/{id_package}','PackageController@update')->name('package.update');
Route::put('/admin_profil/{id}','AdminController@changePassword')->name('changePassword');
Route::resource('/admin_categoryasset','CategoryAssetController');
Route::delete('/{id}/delCategoryAsset','CategoryAssetController@destroy');
Route::resource('/admin_asset','AssetController');
Route::resource('orders','OrdersController');
Route::put('/admin_dashboard/{id}','AdminController@status');
});
Route::get('/admin_konfirmasipembayaran/{id}', 'AdminController@loadFormBayar');
Route::post('/accBookingCode/{id}','AdminController@accBookingCode');
// Route::get('landingpage_package',function(){$package = DB::table('packages')->get();
// 	return view('landingpage_package', ['package' => $package]);
// });
// Route::get('landingpage_setting',function(){
// 	$order = DB::table('orders')->get();
// 	return view('landingpage_setting', ['order' => $order]);
// });


// Route::resource('admin_listcustomer',function(){
// 	$customer = DB::table('users')->get();
// 	return view('admin_listcustomer', ['customer' => $customer]);
// });
// Route::get('landingpage_beranda',function(){
// 	$messages = DB::table('messages')->get();
// 	return view('landingpage_beranda', ['messages' => $messages]);
// }); 