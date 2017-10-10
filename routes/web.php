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

Route::get('/',['as'=>'site.home', 'uses'=>'Site\HomeController@index']);

Route::get('/sobre', ['as'=>'site.sobre','uses'=>'site\paginaController@sobre']);

Route::get('/contato', ['as'=>'site.contato','uses'=>'site\paginaController@contato']);

Route::post('/contato/enviar', ['as'=>'site.contato.enviar','uses'=>'site\paginaController@enviarContato']);

Route::get('/imovel/{id}/{titulo?}', ['as'=>'site.imovel', 'uses' => 'Site\ImovelController@index']);

Route::get('/admin/login',['as'=>'admin.login', function(){
    return view('admin.login.index');
}]);

Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'admin\UsuarioController@login']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'admin\UsuarioController@sair']);

    Route::get('/admin',['as'=>'admin.principal', function(){
        return view('admin.principal.index');
    }]);

    Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'admin\UsuarioController@index']);
    Route::get('/admin/usuarios/adicionar',['as'=>'admin.usuarios.adicionar', 'uses'=>'admin\UsuarioController@adicionar']);
    Route::post('/admin/usuarios/salvar',['as'=>'admin.usuarios.salvar', 'uses'=>'admin\UsuarioController@salvar']);
    Route::get('/admin/usuarios/editar/{id}',['as'=>'admin.usuarios.editar', 'uses'=>'admin\UsuarioController@editar']);
    Route::put('/admin/usuarios/atualizar/{id}',['as'=>'admin.usuarios.atualizar', 'uses'=>'admin\UsuarioController@atualizar']);
    Route::get('/admin/usuarios/deletar/{id}', ['as'=>'admin.usuarios.deletar', 'uses'=>'admin\UsuarioController@deletar']);

    Route::get('/admin/paginas', ['as'=>'admin.paginas', 'uses'=>'admin\PaginaController@index']);
    Route::get('/admin/paginas/editar/{id}', ['as'=>'admin.paginas.editar', 'uses'=>'admin\PaginaController@editar']);
    Route::put('/admin/paginas/atualizar/{id}', ['as'=>'admin.paginas.atualizar', 'uses'=>'admin\PaginaController@atualizar']);

    Route::get('/admin/tipos',['as'=>'admin.tipos', 'uses'=>'admin\TipoController@index']);
    Route::get('/admin/tipos/adicionar',['as'=>'admin.tipos.adicionar', 'uses'=>'admin\TipoController@adicionar']);
    Route::post('/admin/tipos/salvar',['as'=>'admin.tipos.salvar', 'uses'=>'admin\TipoController@salvar']);
    Route::get('/admin/tipo/editar/{id}',['as'=>'admin.tipos.editar', 'uses'=>'admin\TipoController@editar']);
    Route::put('/admin/tipo/atualizar/{id}',['as'=>'admin.tipos.atualizar', 'uses'=>'admin\TipoController@atualizar']);
    Route::get('/admin/tipo/deletar/{id}', ['as'=>'admin.tipos.deletar', 'uses'=>'admin\TipoController@deletar']);

    Route::get('/admin/cidades',['as'=>'admin.cidades', 'uses'=>'admin\CidadeController@index']);
    Route::get('/admin/cidades/adicionar',['as'=>'admin.cidades.adicionar', 'uses'=>'admin\CidadeController@adicionar']);
    Route::post('/admin/cidades/salvar',['as'=>'admin.cidades.salvar', 'uses'=>'admin\CidadeController@salvar']);
    Route::get('/admin/Cidades/editar/{id}',['as'=>'admin.cidades.editar', 'uses'=>'admin\CidadeController@editar']);
    Route::put('/admin/Cidades/atualizar/{id}',['as'=>'admin.cidades.atualizar', 'uses'=>'admin\CidadeController@atualizar']);
    Route::get('/admin/Cidades/deletar/{id}', ['as'=>'admin.cidades.deletar', 'uses'=>'admin\CidadeController@deletar']);

    Route::get('/admin/imoveis',['as'=>'admin.imoveis', 'uses'=>'admin\imovelcontroller@index']);
    Route::get('/admin/imoveis/adicionar',['as'=>'admin.imoveis.adicionar', 'uses'=>'admin\imovelcontroller@adicionar']);
    Route::post('/admin/imoveis/salvar',['as'=>'admin.imoveis.salvar', 'uses'=>'admin\imovelcontroller@salvar']);
    Route::get('/admin/imoveis/editar/{id}',['as'=>'admin.imoveis.editar', 'uses'=>'admin\imovelcontroller@editar']);
    Route::put('/admin/imoveis/atualizar/{id}',['as'=>'admin.imoveis.atualizar', 'uses'=>'admin\imovelcontroller@atualizar']);
    Route::get('/admin/imoveis/deletar/{id}', ['as'=>'admin.imoveis.deletar', 'uses'=>'admin\imovelcontroller@deletar']);

    Route::get('/admin/galerias/{id}',['as'=>'admin.galerias', 'uses'=>'admin\galeriacontroller@index']);
    Route::get('/admin/galerias/adicionar/{id}',['as'=>'admin.galerias.adicionar', 'uses'=>'admin\galeriacontroller@adicionar']);
    Route::post('/admin/galerias/salvar/{id}',['as'=>'admin.galerias.salvar', 'uses'=>'admin\galeriacontroller@salvar']);
    Route::get('/admin/galerias/editar/{id}',['as'=>'admin.galerias.editar', 'uses'=>'admin\galeriacontroller@editar']);
    Route::put('/admin/galerias/atualizar/{id}',['as'=>'admin.galerias.atualizar', 'uses'=>'admin\galeriacontroller@atualizar']);
    Route::get('/admin/galerias/deletar/{id}', ['as'=>'admin.galerias.deletar', 'uses'=>'admin\galeriacontroller@deletar']);
});



