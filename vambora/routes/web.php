<?php


/**
*==============================================================
*ROUTERS HOME
*==============================================================
**/
Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/cadastrarViagem', ['uses' => 'ViagemController@index']);
Route::get('/perfil', ['uses' => 'UsuarioController@perfil']);
Route::get('/logout', ['uses' => 'UsuarioController@sair']);
Route::post('/pesquisar', ['as' => 'viagem.pesquisar', 'uses' => 'GrupoController@pesquisar']);


/**
*==============================================================
*ROUTERS PARA AUTENTICAÇAO USUÁRIO
*==============================================================
**/
Route::get('/login', ['uses' => 'HomeController@login']);
Route::post('/login', ['as' => 'user.login', 'uses' => 'UsuarioController@autenticacao']);

/**
*==============================================================
*ROUTERS CADASTRO/EDITAR USUARIO
*==============================================================
**/

Route::get('/cadastrarUsuario', ['uses' => 'UsuarioController@index']);
Route::post('/cadastrarUsuario', ['as' => 'user.cadastroUsuario','uses' => 'UsuarioController@cadastrar']);
Route::get('/editarUsuario', ['uses' => 'UsuarioController@editar']);

/**
*==============================================================
*ROUTERS CADASTRO/EDITAR VIAGEM
*==============================================================
**/

Route::post('/cadastrarViagem', ['as' => 'viagem.cadastrarViagem','uses' => 'ViagemController@cadastrar']);
