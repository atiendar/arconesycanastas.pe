<?php
/* ===================== [ RUTAS (ENVIOS) ] ===================== */
Route::group(['prefix' => 'envio-local'], function() {
  Route::match(['GET', 'HEAD'],'', 'RolFerro\Envio\EnvioLocalController@index')->name('rolFerro.envioLocal.index');
  Route::match(['GET', 'HEAD'],'detalles/{id_envio}', 'RolFerro\Envio\EnvioLocalController@show')->name('rolFerro.envioLocal.show');
  Route::match(['GET', 'HEAD'],'editar/{id_envio}', 'RolFerro\Envio\EnvioLocalController@edit')->name('rolFerro.envioLocal.edit');
  Route::match(['PUT', 'PATCH'],'actualizar/{id_envio}', 'RolFerro\Envio\EnvioLocalController@update')->name('rolFerro.envioLocal.update');
});

Route::group(['prefix' => 'envio-foraneo'], function() {
  Route::match(['GET', 'HEAD'],'', 'RolFerro\Envio\EnvioForaneoController@index')->name('rolFerro.envioForaneo.index');
  Route::match(['GET', 'HEAD'],'detalles/{id_envio}', 'RolFerro\Envio\EnvioForaneoController@show')->name('rolFerro.envioForaneo.show');
  Route::match(['GET', 'HEAD'],'editar/{id_envio}', 'RolFerro\Envio\EnvioForaneoController@edit')->name('rolFerro.envioForaneo.edit');
  Route::match(['PUT', 'PATCH'],'actualizar/{id_envio}', 'RolFerro\Envio\EnvioForaneoController@update')->name('rolFerro.envioForaneo.update'); 
});