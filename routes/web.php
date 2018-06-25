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

Route::get('/', 'DashboardController@index');

/* MATERIALES PIVOTS */

Route::post('/materiales/storeWithProveedor', 'PivotMaterialController@storeWithProveedor')->name('storeWithProveedor');
Route::get('/materiales/indexWithProveedores/{tipo}', 'PivotMaterialController@indexMaterialesProveedores')->name('indexWithProveedores');
Route::post('/materiales/updateWithParte/{id}', 'PivotMaterialController@updateWithParte')->name('updateMaterialWithParte');
Route::post('/materiales/editarExterno/{id}', 'MaterialExternoController@editarExterno')->name('editarExterno');
Route::post('/materiales/destroyWithParte/{id}', 'PivotMaterialController@destroyWithParte')->name('destroyMaterialWithParte');
Route::post('/materiales/destroyExterno/{id}', 'MaterialExternoController@destroyExterno')->name('destroyExterno');
Route::get('/materiales/refreshAll', 'PivotMaterialController@refreshAllPropierties');
Route::post('/obras/export/{id}', 'ObraController@export')->name('export');
Route::get('/obras/createInfHoras/{id}', 'ObraController@createInfHoras')->name('createInfHoras');
Route::get('/obras/createInfCompras/{id}', 'ObraController@createInfCompras')->name('createInfCompras');

/* FIN MATERIALES PIVOT */

// Clientes autocomplete
Route::get('cliente/autocompletar', 'ClienteController@autocompletar')->name('autocompletarCliente');
Route::get('ExportPRE/{id}', 'excelController@ExportPRE')->name('ExportPRE');

// Duplicar Presupuesto
Route::get('/presupuestos/duplicateForm', 'PresupuestoController@duplicateForm')->name('duplicateForm');
Route::post('/presupuestos/{id}/duplicate', 'PresupuestoController@duplicate')->name('duplicatePresupuesto');
Route::post('/presupuestos/duplicateToObra/{obra_id}', 'PresupuestoController@duplicateToObra')->name('duplicateToObra');
Route::get('/presupuestos/createExist/{obra_id}', 'PresupuestoController@createExist')->name('createExist');

// Duplicar Obra
Route::post('/obras/{id}/duplicate', 'ObraController@duplicate')->name('duplicateObra');
Route::get('/obras/duplicateForm', 'ObraController@duplicateForm')->name('duplicateObraForm');

// DASHBOARD - Actualizar Total Presupuestado
Route::post('/obrasPresupuestadas', 'DashboardController@obrasPresupuestadasJSON')->name('obrasPresupuestadas');
Route::post('/totalPresupuestado', 'DashboardController@totalPresupuestado')->name('actualizarTotalPresupuesto');

// Descargar Presupuesto
Route::get('/presupuesto/pdf/{id}', 'PresupuestoController@getPDF');

Route::resource('materiales', 'MaterialController');
Route::resource('proveedores', 'ProveedorController');
Route::resource('obras', 'ObraController');
Route::resource('partes', 'ParteController');
Route::resource('planos', 'PlanoController');
Route::resource('presupuestos', 'PresupuestoController');
Route::resource('clientes', 'ClienteController');
Route::resource('material_externos', 'MaterialExternoController');
