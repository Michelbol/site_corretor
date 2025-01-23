<?php

namespace App\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Models\Papel;
use App\Models\Permissao;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PapelController extends Controller{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        if(!auth()->user()->can('papel_listar')){
            return view('admin.principal');
        }
        $registros = Papel::all();
        return view('admin.papel.index', compact('registros'));
    }

    /**
     * @return Application|Factory|View
     */
    public function adicionar(){
        if(!auth()->user()->can('papel_adicionar')){
            return view('admin.principal');
        }
        return view('admin.papel.adicionar');
    }

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function salvar(Request $request){
        if(!auth()->user()->can('papel_adicionar')){
            return view('admin.principal');
        }
        Papel::create($request->all());
        return redirect()->route('admin.papel');
    }

    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function editar($id){
        if(!auth()->user()->can('papel_editar')){
            return view('admin.principal');
        }
        if(Papel::find($id)->nome == 'admin'){
            return redirect()->route('admin.papel');
        }
        $registro = Papel::find($id);
        return view('admin.papel.editar', compact('registro'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|Factory|RedirectResponse|View
     */
    public function atualizar(Request $request, $id){
        if(!auth()->user()->can('papel_editar')){
            return view('admin.principal');
        }
        if(Papel::find($id)->nome == 'admin'){
            return redirect()->route('admin.papel');
        }
        Papel::find($id)->update($request->all());
        return redirect()->route('admin.papel');
    }

    /**
     * @param $id
     * @return Application|Factory|RedirectResponse|View
     * @throws Exception
     */
    public function deletar($id){
        if(!auth()->user()->can('papel_deletar')){
            return view('admin.principal');
        }
        if(Papel::find($id)->nome == 'admin'){
            return redirect()->route('admin.papel');
        }
        Papel::find($id)->delete();
        return redirect()->route('admin.papel');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function permissao($id){
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('admin.papel.permissao', compact('papel', 'permissao'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function salvarPermissao(Request $request, $id){
        $papel = Papel::find($id);
        $permissao = Permissao::find($request['permissao_id']);
        $papel->adicionarPermissao($permissao);
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $id_permissao
     * @return RedirectResponse
     */
    public function removerPermissao($id, $id_permissao){
        $papel = Papel::find($id);
        $permissao = Permissao::find($id_permissao);
        $papel->removerPermissao($permissao);
        return redirect()->back();
    }
}
