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
    return view('dashboard');
});

/* MATERIALES */

Route::get('/materiales/create-small', function () {
    return view('materiales.create-small');
});
Route::resource('materiales', 'MaterialController');
Route::post('/materiales/storeWithProveedor', 'MaterialController@storeWithProveedor');
Route::get('/materiales/indexWithProveedores/{tipo}', 'MaterialController@indexMaterialesProveedores');
Route::post('/materiales/updateWithParte/{id}', 'MaterialController@updateWithParte')->name('updateMaterialWithParte');
Route::post('/materiales/destroyWithParte/{id}', 'MaterialController@destroyWithParte')->name('destroyMaterialWithParte');
Route::get('/materiales/refreshAll', 'MaterialController@refreshAllPropierties');

/* FIN MATERIALES */

Route::resource('proveedores', 'ProveedorController');
Route::resource('obras', 'ObraController');
Route::resource('partes', 'ParteController');
Route::resource('presupuestos', 'PresupuestoController');
Route::resource('clientes', 'ClienteController');
