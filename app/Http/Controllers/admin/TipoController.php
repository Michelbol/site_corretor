<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Imovel;
use Illuminate\View\View;
use Session;

class TipoController extends Controller{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $registros = Tipo::all();
        return view('admin.tipos.index', compact('registros'));
    }

    /**
     * @return Application|Factory|View
     */
    public function adicionar(){
        return view('admin.tipos.adicionar');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function salvar(Request $request){
        $dados = $request->all();

        $registro = new Tipo();

        $registro->titulo = $dados['titulo'];
        $registro->save();

        Session::flash('mensagem', ['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.tipos');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $registro = Tipo::find($id);
        return view('admin.tipos.editar', compact('registro'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function  atualizar(Request $request, $id){
        $registro = Tipo::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->update();

        Session::flash('mensagem', ['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.tipos');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deletar($id){
        if(Imovel::where('tipo_id','=',$id)->count()){
            $msg = "Não é possível deletar esse tipo de imóvel! Esses imóveis (";
            $imoveis = Imovel::where('tipo_id','=',$id)->get();
            foreach ($imoveis as $imovel){
                $msg .= "id:".$imovel->id." ";
            }
            $msg .= ") estão relacionados";

            Session::flash('mensagem', ['msg'=> $msg,'class'=>'red white-text']);
            return redirect()->route('admin.tipos');
        }
        Tipo::find($id)->delete();
        Session::flash('mensagem', ['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.tipos');
    }
}
