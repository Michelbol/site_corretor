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

Route::get('/sobre', ['as'=>'site.sobre','uses'=>'Site\PaginaController@sobre']);

Route::get('/contato', ['as'=>'site.contato','uses'=>'Site\PaginaController@contato']);

Route::post('/contato/enviar', ['as'=>'site.contato.enviar','uses'=>'Site\PaginaController@enviarContato']);

Route::get('/imovel/{id}/{titulo?}', ['as'=>'site.imovel', 'uses' => 'Site\ImovelController@index']);

Route::get('/busca', ['as'=>'site.busca', 'uses' => 'Site\HomeController@busca']);

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

    Route::get('/admin/usuarios/papel/{i}',['as'=>'admin.usuarios.papel', 'uses'=>'admin\UsuarioController@papel']);
    Route::post('/admin/usuarios/papel/salvar/{i}',['as'=>'admin.usuarios.papel.salvar', 'uses'=>'admin\UsuarioController@salvarPapel']);
    Route::get('/admin/usuarios/papel/remover/{i}/{papel_id}',['as'=>'admin.usuarios.papel.remover', 'uses'=>'admin\UsuarioController@removerPapel']);

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

    Route::get('/admin/imoveis',['as'=>'admin.imoveis', 'uses'=>'admin\ImovelController@index']);
    Route::get('/admin/imoveis/adicionar',['as'=>'admin.imoveis.adicionar', 'uses'=>'admin\ImovelController@adicionar']);
    Route::post('/admin/imoveis/salvar',['as'=>'admin.imoveis.salvar', 'uses'=>'admin\ImovelController@salvar']);
    Route::get('/admin/imoveis/editar/{id}',['as'=>'admin.imoveis.editar', 'uses'=>'admin\ImovelController@editar']);
    Route::put('/admin/imoveis/atualizar/{id}',['as'=>'admin.imoveis.atualizar', 'uses'=>'admin\ImovelController@atualizar']);
    Route::get('/admin/imoveis/deletar/{id}', ['as'=>'admin.imoveis.deletar', 'uses'=>'admin\ImovelController@deletar']);

    Route::get('/admin/galerias/{id}',['as'=>'admin.galerias', 'uses'=>'admin\GaleriaController@index']);
    Route::get('/admin/galerias/adicionar/{id}',['as'=>'admin.galerias.adicionar', 'uses'=>'admin\GaleriaController@adicionar']);
    Route::post('/admin/galerias/salvar/{id}',['as'=>'admin.galerias.salvar', 'uses'=>'admin\GaleriaController@salvar']);
    Route::get('/admin/galerias/editar/{id}',['as'=>'admin.galerias.editar', 'uses'=>'admin\GaleriaController@editar']);
    Route::put('/admin/galerias/atualizar/{id}',['as'=>'admin.galerias.atualizar', 'uses'=>'admin\GaleriaController@atualizar']);
    Route::get('/admin/galerias/deletar/{id}', ['as'=>'admin.galerias.deletar', 'uses'=>'admin\GaleriaController@deletar']);

    Route::get('/admin/slides',['as'=>'admin.slides', 'uses'=>'admin\SlideController@index']);
    Route::get('/admin/slides/adicionar',['as'=>'admin.slides.adicionar', 'uses'=>'admin\SlideController@adicionar']);
    Route::post('/admin/slides/salvar',['as'=>'admin.slides.salvar', 'uses'=>'admin\SlideController@salvar']);
    Route::get('/admin/slides/editar/{id}',['as'=>'admin.slides.editar', 'uses'=>'admin\SlideController@editar']);
    Route::put('/admin/slides/atualizar/{id}',['as'=>'admin.slides.atualizar', 'uses'=>'admin\SlideController@atualizar']);
    Route::get('/admin/slides/deletar/{id}', ['as'=>'admin.slides.deletar', 'uses'=>'admin\SlideController@deletar']);

    Route::get('/admin/papel',['as'=>'admin.papel', 'uses'=>'admin\PapelController@index']);
    Route::get('/admin/papel/adicionar',['as'=>'admin.papel.adicionar', 'uses'=>'admin\PapelController@adicionar']);
    Route::post('/admin/papel/salvar',['as'=>'admin.papel.salvar', 'uses'=>'admin\PapelController@salvar']);
    Route::get('/admin/papel/editar/{id}',['as'=>'admin.papel.editar', 'uses'=>'admin\PapelController@editar']);
    Route::put('/admin/papel/atualizar/{id}',['as'=>'admin.papel.atualizar', 'uses'=>'admin\PapelController@atualizar']);
    Route::get('/admin/papel/deletar/{id}', ['as'=>'admin.papel.deletar', 'uses'=>'admin\PapelController@deletar']);
    Route::get('/admin/papel/permissao/{id}',['as'=>'admin.papel.permissao', 'uses'=>'admin\PapelController@permissao']);
    Route::post('/admin/papel/permissao/{id}/salvar',['as'=>'admin.papel.permissao.salvar', 'uses'=>'admin\PapelController@SalvarPermissao']);
    Route::get('/admin/papel/permissao/{id}/remover/{id_permissao}',['as'=>'admin.papel.permissao.remover', 'uses'=>'admin\PapelController@RemoverPermissao']);

    Route::get('/admin/papel/permissao/{id}',['as'=>'admin.papel.permissao', 'uses'=>'admin\PapelController@permissao']);
    Route::post('/admin/papel/permissao/salvar/{id}',['as'=>'admin.papel.permissao.salvar', 'uses'=>'admin\PapelController@salvarPermissao']);
    Route::get('/admin/papel/permissao/remover/{id}/{id_permissao}',['as'=>'admin.papel.permissao.remover', 'uses'=>'admin\PapelController@removerPermissao']);
});



