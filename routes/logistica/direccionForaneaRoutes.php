<?php
/* ===================== [ RUTAS LOGÍSTICA (ARMADOS FORANEOS) ] ===================== */
Route::group(['prefix' => 'foraneo'], function() {
  Route::match(['GET', 'HEAD'],'', 'Logistica\DireccionForaneo\DireccionForaneoController@index')->name('logistica.direccionForaneo.index')->middleware('permission:logistica.direccionForaneo.index|logistica.direccionForaneo.show|logistica.direccionForaneo.edit');
  Route::match(['GET', 'HEAD'],'detalles/{id_direccion}', 'Logistica\DireccionForaneo\DireccionForaneoController@show')->name('logistica.direccionForaneo.show')->middleware('permission:logistica.direccionForaneo.show');

  Route::group(['prefix' => 'comprobante-de-salida'], function() {
    Route::match(['GET', 'HEAD'],'registrar/{id_direccion}', 'Logistica\DireccionForaneo\DireccionForaneoController@create')->name('logistica.direccionForaneo.create')->middleware('permission:logistica.direccionForaneo.create');
    Route::post('almacenar/{id_direccion}', 'Logistica\DireccionForaneo\DireccionForaneoController@store')->name('logistica.direccionForaneo.store')->middleware('permission:logistica.direccionForaneo.create');
  });

  Route::group(['prefix' => 'comprobante-de-entrega'], function() {
    Route::match(['GET', 'HEAD'],'registrar/{id_comprobante}', 'Logistica\DireccionForaneo\DireccionForaneoController@createEntrega')->name('logistica.direccionForaneo.createEntrega')->middleware('permission:logistica.direccionForaneo.create');
    Route::post('almacenar/{id_comprobante}', 'Logistica\DireccionForaneo\DireccionForaneoController@storeEntrega')->name('logistica.direccionForaneo.storeEntrega')->middleware('permission:logistica.direccionForaneo.create');
  });
});