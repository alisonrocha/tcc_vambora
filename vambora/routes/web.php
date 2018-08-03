<?php


/**
*==============================================================
*ROUTERS HOME
*==============================================================
**/
Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/viagem/cadastrar', ['uses' => 'ViagemController@index']);
Route::get('/perfil', ['uses' => 'UsuarioController@perfil']);
Route::get('/logout', ['uses' => 'UsuarioController@sair']);
Route::get('/blog', ['uses' => 'BlogController@index']);
Route::get('/forum', ['uses' => 'ForumController@index']);
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
Route::post('/cadastrarUsuario', ['as' => 'usuario.cadastro','uses' => 'UsuarioController@cadastrar']);
Route::get('/editarUsuario', ['uses' => 'UsuarioController@editar']);

/**
*==============================================================
*ROUTERS CADASTRO/EDITAR VIAGEM
*==============================================================
**/

Route::post('/cadastrarViagem', ['as' => 'viagem.cadastrarViagem','uses' => 'ViagemController@cadastrar']);
