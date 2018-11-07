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
Route::get('/reset', ['uses' => 'HomeController@reset']);

/**
*==============================================================
*ROUTERS CADASTRO/EDITAR USUARIO
*==============================================================
**/

Route::get('/cadastrar', ['uses' => 'UsuarioController@index']);
Route::post('/cadastrar', ['as' => 'usuario.cadastro','uses' => 'UsuarioController@cadastrar']);
Route::get('/editar', ['uses' => 'UsuarioController@editar']);

/**
*==============================================================
*ROUTERS CADASTRO/EDITAR VIAGEM
*==============================================================
**/

Route::post('/cadastrarViagem', ['as' => 'viagem.cadastrarViagem','uses' => 'ViagemController@cadastrar']);


/**
*==============================================================
*ROUTERS GRUPO
*==============================================================
**/

Route::get('/grupo/{id}', ['uses' => 'GrupoController@index']);
Route::get('/participar/{id}', ['uses' => 'GrupoController@participar']);
Route::post('/grupo', ['as' => 'grupo.grupo', 'uses' => 'GrupoController@mensagem']);

/**
*==============================================================
*ROUTERS BLOG
*==============================================================
**/

Route::post('/cadastrar/historia', ['as' => 'historia.cadastro','uses' => 'BlogController@cadastrar']);