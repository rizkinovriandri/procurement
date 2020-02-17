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
    return view('auth/login');
    //return view('dashboard');
});

Route::get('/register', function () {
    return view('auth/register');
    //return view('dashboard');
});

Route::get('/test_template', function () {
    //return view('layouts/template');
    return view('dashboard');
});

Route::get('/user_list', function () {
    //return view('layouts/template');
    return view('user_list');
});


Route::group(['middleware' => 'web'], function () {
	Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function () {
		Route::resource('users', 'UsersController');
	});
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	// Route::get('foo/{id}/bar', 'FooController@bar'); will pass the id to bar($id) method
	Route::get('vendors/suspended', 'VendorsController@suspended');
	Route::get('vendors/keagenan', 'VendorsController@keagenan');
	Route::get('vendors/evaluasi', 'VendorsController@evaluasi');
	Route::resource('vendors', 'VendorsController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('statuses', 'StatusController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('aktas', 'AktasController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('skkems', 'SkkemController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('siups', 'SiupController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('tdps', 'TdpController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('siujks', 'SiujkController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('apis', 'ApiController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('penguruses', 'PengurusController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('rekenings', 'RekeningController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('modals', 'ModalController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('lapkeus', 'LapkeuController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('perpajakans', 'PerpajakanController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('tenagaahlis', 'TenagaAhliController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('sertifikats', 'SertifikatController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('fasilitases', 'FasilitasController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('pengalamans', 'PengalamanController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('keagenans', 'KeagenanController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('bidangs', 'BidangController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('itembidangs', 'ItemBidangController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('subbarangs', 'SubBarangController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('subjasas', 'SubJasaController');
});

Route::group(['prefix'=>'', 'middleware'=>['auth']], function () {
	Route::resource('pengadaans', 'PengadaanController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::POST('userstore', 'UsersController@store');

Route::POST('vendorstore', 'VendorsController@store');

Route::POST('aktastore', 'AktasController@store');

Route::POST('skkemstore', 'SkkemController@store');

Route::POST('siupstore', 'SiupController@store');

Route::POST('tdpstore', 'TdpController@store');

Route::POST('siujkstore', 'SiujkController@store');

Route::POST('apistore', 'ApiController@store');

Route::POST('pengurusstore', 'PengurusController@store');

Route::POST('rekeningstore', 'RekeningController@store');

Route::POST('modalstore', 'ModalController@store');

Route::POST('lapkeustore', 'LapkeuController@store');

Route::POST('perpajakanstore', 'PerpajakanController@store');

Route::POST('tenagaahlistore', 'TenagaAhliController@store');

Route::POST('sertifikatstore', 'SertifikatController@store');

Route::POST('fasilitasstore', 'FasilitasController@store');

Route::POST('pengalamanstore', 'PengalamanController@store');

Route::POST('keagenanstore', 'KeagenanController@store');

Route::POST('bidangstore', 'BidangController@store');

Route::POST('itembidangstore', 'ItemBidangController@store');

Route::POST('subbarangstore', 'SubBarangController@store');

Route::POST('subjasastore', 'SubJasaController@store');

Route::POST('statusstore', 'StatusController@store');


//Route::POST('vendorupdate', ['VendorsController@update',$vendor->id];

