<?php


/**
*ROUTERS HOME
*==============================================================
**/
Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastrarViagem', ['uses' => 'Controller@cadastrarViagem']);
Route::get('/perfil', ['uses' => 'UsuarioController@perfilUsuario']);
Route::get('/logout', ['uses' => 'UsuarioController@logout']);


/**
*ROUTERS PARA AUTENTICAÇAO USUÁRIO
*==============================================================
**/
Route::get('/login', ['uses' => 'Controller@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'UsuarioController@autenticacao']);

/**
*ROUTERS CADASTRO/EDITAR USUARIO
*==============================================================
**/

Route::get('/cadastrarUsuario', ['uses' => 'UsuarioController@cadastrarUsuario']);
Route::post('/cadastrarUsuario', ['as' => 'user.cadastroUsuario','uses' => 'UsuarioController@store']);
Route::get('/editarUsuario', ['uses' => 'UsuarioController@editarUsuario']);

/**
*ROUTERS CADASTRO/EDITAR VIAGEM
*==============================================================
**/

Route::post('/cadastrarViagem', ['as' => 'viagem.cadastrarViagem','uses' => 'ViagemController@store']);
