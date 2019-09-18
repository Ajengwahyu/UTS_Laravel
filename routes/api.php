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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Usercontroller@register');
Route::post('login', 'Usercontroller@login');

Route::middleware(['jwt.verify'])->group(function(){
	Route::get('/mobil', 'mobilcontroller@index');
	Route::get('/mobil/{id}', 'mobilcontroller@show');
	Route::post('/mobil', 'mobilcontroller@store');
	Route::put('/mobil/{id}', 'mobilcontroller@update');
	Route::delete('/mobil/{id}', 'mobilcontroller@destroy');
	//Route::get('mobil', 'mobilcontroller@mobil');
	//Route::get('mobilall', 'mobilcontroller@mobilAuth');
	//Route::get('user', 'Usercontroller@getAuthenticated');
});

	


