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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'superadministrator', 'middleware' => ['role:superadministrator']], function() {

    Route::get('users', 'Admin\UsuarioController@index')->name('users.index');
	Route::put('users/{user}', 'Admin\UsuarioController@update')->name('users.update');
	Route::get('users/{user}', 'Admin\UsuarioController@show')->name('users.show');
	Route::delete('users/{user}', 'Admin\UsuarioController@destroy')->name('users.destroy');
    Route::get('users/{user}/edit', 'Admin\UsuarioController@edit')->name('users.edit');

    Route::resource('roles', 		'Admin\RoleController');
    Route::resource('permissions', 		'Admin\PermisosController');

    Route::resource('capital', 		'User\CapitalController');
    Route::post('capital', 'User\CapitalController@agregar')->name('capital.agregar');
    Route::post('capital', 'User\CapitalController@quitar')->name('capital.quitar');


});

Route::group(['prefix' => 'user', 'middleware' => ['role:superadministrator']], function() {



    Route::resource('capital', 		'User\CapitalController');
    Route::put('capitalagregar', 'User\CapitalController@agregar')->name('capital.agregar');
    Route::put('capitalretirar', 'User\CapitalController@retirar')->name('capital.retirar');
    Route::resource('clientes', 		'User\ClienteController');

    //prestamo x usuario
    Route::resource('prestamos', 		'User\prestamoController');
    Route::resource('buscarcliente', 		'User\BuscarClienteController');
    Route::post('buscarcliente', 'User\prestamoController@getcliente')->name('cliente.buscar');

    // prestamos x cliente
    Route::resource('prestamoscliente', 		'User\prestamoClienteController');

    Route::get('prestamoclientebuscar', 'User\prestamoClienteController@buscarcliente')->name('prestamoscliente.buscar'); // mostrar busqueda
    Route::post('prestamoclientegetcliente', 'User\prestamoClienteController@getclientebuscarcliente')->name('prestamoscliente.get'); //buscar

    //abonos
    Route::resource('abonos', 		'User\abonoController');

    //rutas
    
    Route::get('rutas/Diaria', 'User\RutaController@index')->name('rutas.index');
    Route::get('rutas/Semanal', 'User\RutaController@indexSem')->name('rutas.indexSem');
    Route::get('rutas/Quincenal', 'User\RutaController@indexQui')->name('rutas.indexQui');
    Route::get('rutas/Mensual', 'User\RutaController@indexMen')->name('rutas.indexMen');

});
