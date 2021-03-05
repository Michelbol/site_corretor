<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Imovel;
use Illuminate\View\View;
use Session;

class CidadeController extends Controller{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $registros = Cidade::all();
        return view('admin.cidades.index', compact('registros'));
    }

    /**
     * @return Application|Factory|View
     */
    public function adicionar(){
        return view('admin.cidades.adicionar');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function salvar(Request $request){
        $dados = $request->all();

        $registro = new Cidade();

        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
        $registro->save();

        Session::flash('mensagem', ['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.cidades');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $registro = Cidade::find($id);
        return view('admin.cidades.editar', compact('registro'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function  atualizar(Request $request, $id){
        $registro = Cidade::find($id);
        $dados = $request->all();
        $registro->nome = $dados['nome'];
        $registro->estado = $dados['estado'];
        $registro->sigla_estado = $dados['sigla_estado'];
        $registro->update();

        Session::flash('mensagem', ['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.cidades');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deletar($id){
        if(Imovel::where('cidade_id','=',$id)->count()){
            $msg = "Não é possível deletar essa cidade! Esses imóveis (";
            $imoveis = Imovel::where('cidade_id','=',$id)->get();
            foreach ($imoveis as $imovel){
                $msg .= "id:".$imovel->id." ";
            }
            $msg .= ") estão relacionados";

            Session::flash('mensagem', ['msg'=> $msg,'class'=>'red white-text']);
            return redirect()->route('admin.cidades');
        }
        Cidade::find($id)->delete();

        Session::flash('mensagem', ['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.cidades');
    }
}
