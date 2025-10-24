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

Route::group(['as' => 'site.', 'namespace' => 'Site'], function(){
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/sobre', ['as' => 'sobre', 'uses' => 'PaginaController@sobre']);
    Route::get('/contato', ['as' => 'contato', 'uses' => 'PaginaController@contato']);
    Route::post('/contato/enviar', ['as' => 'contato.enviar', 'uses' => 'PaginaController@enviarContato']);
    Route::get('/imovel/{id}/{titulo?}', ['as' => 'imovel', 'uses' => 'ImovelController@index']);
    Route::get('/busca', ['as' => 'busca', 'uses' => 'HomeController@busca']);
});

Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@index']);
Route::post('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\UsuarioController@login']);

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    Route::get('/login/sair', ['as' => 'login.sair', 'uses' => 'UsuarioController@sair']);

    Route::get('', ['as' => 'principal', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'usuarios', 'as' => 'usuarios'], function () {
        Route::get('', ['uses' => 'UsuarioController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'UsuarioController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'UsuarioController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'UsuarioController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'UsuarioController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'UsuarioController@deletar']);

        Route::group(['prefix' => 'papel', 'as' => '.papel'], function () {
            Route::get('/{i}', ['uses' => 'UsuarioController@papel']);
            Route::post('/salvar/{i}', ['as' => '.salvar', 'uses' => 'UsuarioController@salvarPapel']);
            Route::get('/remover/{i}/{papel_id}', ['as' => '.remover', 'uses' => 'UsuarioController@removerPapel']);
        });
    });
    Route::group(['prefix' => 'paginas', 'as' => 'paginas'], function () {
        Route::get('', ['uses' => 'PaginaController@index']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'PaginaController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'PaginaController@atualizar']);
    });

    Route::group(['prefix' => 'tipos', 'as' => 'tipos'], function () {
        Route::get('', ['uses' => 'TipoController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'TipoController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'TipoController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'TipoController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'TipoController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'TipoController@deletar']);
    });

    Route::group(['prefix' => 'cidades', 'as' => 'cidades'], function () {
        Route::get('', ['uses' => 'CidadeController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'CidadeController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'CidadeController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'CidadeController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'CidadeController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'CidadeController@deletar']);
    });
    Route::group(['prefix' => 'imoveis', 'as' => 'imoveis'], function(){
        Route::get('', ['uses' => 'ImovelController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'ImovelController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'ImovelController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'ImovelController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'ImovelController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'ImovelController@deletar']);
    });
    Route::group(['prefix' => 'galerias', 'as' => 'galerias'], function(){
        Route::get('/{id}', ['uses' => 'GaleriaController@index']);
        Route::get('/adicionar/{id}', ['as' => '.adicionar', 'uses' => 'GaleriaController@adicionar']);
        Route::post('/salvar/{id}', ['as' => '.salvar', 'uses' => 'GaleriaController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'GaleriaController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'GaleriaController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'GaleriaController@deletar']);
    });

    Route::group(['prefix' => 'slides', 'as' => 'slides'], function(){
        Route::get('', ['uses' => 'SlideController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'SlideController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'SlideController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'SlideController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'SlideController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'SlideController@deletar']);
    });

    Route::group(['prefix' => 'papel', 'as' => 'papel'], function(){
        Route::get('', ['uses' => 'PapelController@index']);
        Route::get('/adicionar', ['as' => '.adicionar', 'uses' => 'PapelController@adicionar']);
        Route::post('/salvar', ['as' => '.salvar', 'uses' => 'PapelController@salvar']);
        Route::get('/editar/{id}', ['as' => '.editar', 'uses' => 'PapelController@editar']);
        Route::put('/atualizar/{id}', ['as' => '.atualizar', 'uses' => 'PapelController@atualizar']);
        Route::get('/deletar/{id}', ['as' => '.deletar', 'uses' => 'PapelController@deletar']);

        Route::group(['prefix' => 'permissao', 'as' => '.permissao'], function (){
            Route::get('/{id}', [ 'uses' => 'PapelController@permissao']);
            Route::post('/{id}/salvar', ['as' => '.salvar', 'uses' => 'PapelController@SalvarPermissao']);
            Route::get('/{id}/remover/{id_permissao}', ['as' => '.remover', 'uses' => 'PapelController@RemoverPermissao']);
            Route::post('/salvar/{id}', ['as' => '.salvar', 'uses' => 'PapelController@salvarPermissao']);
            Route::get('/remover/{id}/{id_permissao}', ['as' => '.remover', 'uses' => 'PapelController@removerPermissao']);
        });
    });
});



