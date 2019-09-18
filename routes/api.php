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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::middleware(['jwt.verify'])->group(function(){
    Route::get('mobil', 'MobilController@index');
    Route::get('mobil/{id}', 'MobilController@show');
    Route::post('mobil', 'MobilController@tambah');
    Route::put('mobil/{id}', 'MobilController@ubah');
    Route::delete('mobil/{id}', 'MobilController@hapus');
    Route::post('sewa/{id}', 'SewaController@sewa');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
