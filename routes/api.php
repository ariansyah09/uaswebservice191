<?php

use App\Http\Controllers\BarangController;
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

Route::get('password', function(){
    return bcrypt ('lalala');
});

//----REST API  BARANG ----

//get all Barang
Route::get('barang', 'API\BarangController@index');

//get spesific Barang detail
Route::get('barang/{id}', 'API\BarangController@show');

//add barang
Route::post('barang', 'API\BarangController@store');

//update barang
Route::get('barang/{id}', 'API\BarangController@update');

//delete barang
Route::get('Barang/{id}', 'API\BarangController@destroy');


//----- REST API PENYEWAAN-----------
// Get all Penyewaan
Route::get('penyewaann', 'API\PenyewaannController@index');

// Get Specic Penyewaan detail
Route::get('penyewaann/{id}', 'API\PenyewaannController@show');

// Add Penyewaan
Route::post('penyewaann', 'API\PenyewaannController@store');

// Update Penyewaan
Route::put('penyewaann/{id}', 'API\PenyewaannController@update');

// Delete Penyewaan
Route::delete('penyewaann/{id}', 'API\PenyewaannController@destroy');

//----- REST API PENYEWAAN-----------
// Get all Penyewaan
Route::get('kategori', 'API\KategoriController@index');

// Get Specic Penyewaan detail
Route::get('kategori/{id}', 'API\KategoriController@show');

// Add Penyewaan
Route::post('kategori', 'API\KategoriController@store');

// Update Penyewaan
Route::put('kategori/{id}', 'API\KategoriController@update');

// Delete Penyewaan
Route::delete('kategori/{id}', 'API\KategoriController@destroy');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


