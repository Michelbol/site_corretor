<?php

namespace app\Http\Controllers\Admin2;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Imovel;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        $this->successMessage('Registro criado com sucesso!');

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

        $this->successMessage('Registro atualizado com sucesso!');

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

            $this->errorMessage($msg);
            return redirect()->route('admin.cidades');
        }
        Cidade::find($id)->delete();

        $this->successMessage('Registro deletado com sucesso!');
        return redirect()->route('admin.cidades');
    }
}
