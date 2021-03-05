<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galeria;
use App\Utilitarios;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Tipo;
use App\Models\Cidade;
use Illuminate\View\View;
use Session;
use Str;

class ImovelController extends Controller{

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $registros = Imovel::all();
        return view('admin.imoveis.index', compact('registros'));
    }

    /**
     * @return Application|Factory|View
     */
    public function adicionar(){
        $tipos = Tipo::all();
        $cidades = Cidade::all();
        return view('admin.imoveis.adicionar', compact('tipos','cidades'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function salvar(Request $request){
        $dados = $request->all();

        $registro = new Imovel();

        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->status = $dados['status'];
        $registro->imagem = $dados['imagem'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->valor = Utilitarios::formatReal($dados['valor']);
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes = $dados['detalhes'];
        //$registro->vizualizacoes = 0;
        $registro->publicar = $dados['publicar'];
        if(isset($dados['mapa']) && trim($dados['mapa']) != ""){
            $registro->mapa = trim($dados['mapa']);
        }else{
            $registro->mapa = null;
        }
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];

        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/". Str::slug($dados['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro->save();

        Session::flash('mensagem', ['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imoveis');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $registro = Imovel::find($id);
        $tipos = Tipo::all();
        $cidades = Cidade::all();
        return view('admin.imoveis.editar', compact('registro','tipos','cidades'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function  atualizar(Request $request, $id){
        $registro = Imovel::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->status = $dados['status'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->valor = Utilitarios::formatReal($dados['valor']);
        $registro->dormitorios = $dados['dormitorios'];
        $registro->detalhes = $dados['detalhes'];
        $registro->publicar = $dados['publicar'];
        if(isset($dados['mapa']) && trim($dados['mapa']) != ""){
            $registro->mapa = trim($dados['mapa']);
        }else{
            $registro->mapa = null;
        }
        $registro->cidade_id = $dados['cidade_id'];
        $registro->tipo_id = $dados['tipo_id'];
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/imoveis/". Str::slug($dados['titulo'],'_')."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro->update();

        Session::flash('mensagem', ['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.imoveis');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deletar($id){
        $images = Galeria::where('imovel_id', $id)->get();
        foreach ($images as $image){
            $image->delete();
        }
        Imovel::find($id)->delete();

        Session::flash('mensagem', ['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admin.imoveis');
    }
}
