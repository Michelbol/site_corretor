<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Imovel;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class GaleriaController extends Controller{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id){
        $imovel = Imovel::find($id);
        $registros = $imovel->galeria()->orderBy('ordem')->get();
        return view('admin.galerias.index', compact('registros', 'imovel'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function adicionar($id){
        $imovel = Imovel::find($id);
        return view('admin.galerias.adicionar', compact('imovel'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function salvar(Request $request, $id){
        $imovel = Imovel::find($id);
        if($imovel->galeria()->count()){
            $galeria = $imovel->galeria()->orderByDesc('ordem')->first();
            $ordemAtual = $galeria->ordem;
        }else{
            $ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
            $arquivos = $request->file('imagens');
            foreach ($arquivos as $imagem){
                $registro = new Galeria();

                $rand = rand(11111,99999);
                $diretorio = "img/imoveis/". Str::slug($imovel->titulo,'_')."/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $imagem->move($diretorio,$nomeArquivo);
                $registro->imovel_id =$imovel->id;
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->imagem = $diretorio.'/'.$nomeArquivo;
                $registro->save();
            }
        }
        $this->successMessage('Registro criado com sucesso!');
        return redirect()->route('admin.galerias', $imovel->id);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $registro = Galeria::find($id);
        $imovel = $registro->imovel;
        return view('admin.galerias.editar', compact('registro', 'imovel'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function  atualizar(Request $request, $id){
        $registro = Galeria::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->ordem = $dados['ordem'];
        $imovel = $registro->imovel;

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/". Str::slug($imovel->titulo,'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro->update();

        $this->successMessage('Registro atualizado com sucesso!');

        return redirect()->route('admin.galerias', $imovel->id);
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deletar($id){
        $galeria = Galeria::find($id);
        $imovel = $galeria->imovel;
        $galeria->delete();

        $this->successMessage('Registro deletado com sucesso!');
        return redirect()->route('admin.galerias', $imovel->id);
    }
}
