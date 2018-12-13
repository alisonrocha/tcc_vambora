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
Route::post('/login/recuperar', ['as' => 'user.recuperar', 'uses' => 'UsuarioController@recuperar']);


/**
*==============================================================
*ROUTERS CADASTRO/EDITAR USUARIO
*==============================================================
**/

Route::get('/cadastrar', ['uses' => 'UsuarioController@index']);
Route::post('/cadastrar', ['as' => 'usuario.cadastro','uses' => 'UsuarioController@cadastrar']);
Route::get('/editarUsuario/{id}', ['uses' => 'UsuarioController@editar']);
Route::post('/editar', ['as' => 'usuario.editar','uses' => 'UsuarioController@update']);
Route::get('/desativar', ['uses' => 'UsuarioController@destroy']);
Route::get('/numeroGrupoCadastrados/{id}', ['uses' => 'UsuarioController@numeroGrupoCadastrados']);
Route::get('/numeroGrupoParticipando/{id}', ['uses' => 'UsuarioController@numeroGrupoParticipando']);


/**
*==============================================================
*ROUTERS CADASTRO/EDITAR VIAGEM
*==============================================================
**/

Route::post('/cadastrarViagem', ['as' => 'viagem.cadastrarViagem','uses' => 'ViagemController@cadastrar']);
Route::get('/editarViagem/{id}', ['uses' => 'ViagemController@editar']);
Route::post('/editar', ['as' => 'viagem.editar','uses' => 'ViagemController@update']);


/**
*==============================================================
*ROUTERS GRUPO
*==============================================================
**/

Route::get('/grupo/{id}', ['uses' => 'GrupoController@index']);
Route::get('/participar/{id}', ['uses' => 'GrupoController@participar']);
Route::post('/grupo', ['as' => 'grupo.grupo', 'uses' => 'GrupoController@mensagem']);
Route::view('/grupo', 'grupo');
Route::post('/comentario', ['as' => 'grupo.comentario', 'uses' => 'GrupoController@comentario']); //antiga
Route::get('/sairGrupo', ['uses' => 'GrupoController@destroy']);

Route::get('/grupo/{id}/mensagens', ['as' => 'grupo.mensagens', 'uses' => 'GrupoController@mensagens']);
Route::get('/mensagem/{id}/comentar', ['as' => 'grupo.comentar', 'uses' => 'GrupoController@comentar']);
Route::get('/mensagem/{id}/comentarios', ['as' => 'grupo.comentarios', 'uses' => 'GrupoController@comentarios']);
/**
*==============================================================
*ROUTERS BLOG
*==============================================================
**/

Route::post('/blog', ['as' => 'historia.cadastro','uses' => 'BlogController@cadastrar']);
Route::get('/historia', 'BlogController@listarHistoria');
Route::resource ( '/blogs' , 'BlogController@index' );


/**
*==============================================================\
*ROUTERS NOTIFICAÇÕES
*==============================================================
**/
Route::get('/retornaNotificacoes/{id}', ['uses' => 'NotificacaoController@retornaNotificacoes']);

/**
*==============================================================\
*ROUTERS GRUPOS CADASTRADOS
*==============================================================
**/

Route::get('/gruposCadastrados/{id}', ['uses' => 'GrupoController@gruposCadastrados']);

/**
*==============================================================\
*ROUTERS GRUPOS PARTICIPANDO
*==============================================================
**/

Route::get('/gruposParticipando/{id}', ['uses' => 'GrupoController@gruposParticipando']);
Route::get('/perfilParticipante/{id}', ['uses' => 'GrupoController@perfilParticipante']);


/**
*==============================================================\
*ROUTERS QUESTIONARIO
*==============================================================
**/

Route::post('/questionario', ['as' => 'grupo.questionario','uses' => 'QuestionarioController@questionario']);
