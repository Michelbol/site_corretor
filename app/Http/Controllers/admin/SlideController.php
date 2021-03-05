<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\View\View;
use Session;

class SlideController extends Controller{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $registros = Slide::orderBy('ordem')->get();
        return view('admin.slides.index', compact('registros'));
    }

    /**
     * @return Application|Factory|View
     */
    public function adicionar(){
        return view('admin.slides.adicionar');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function salvar(Request $request){
        if(Slide::count()){
            $slides = Slide::orderBy('ordem', 'desc')->first();
            $ordemAtual = $slides->ordem;
        }else{
            $ordemAtual = 0;
        }
        if($request->hasFile('imagens')){
            $arquivos = $request->file('imagens');
            foreach ($arquivos as $imagem){
                $registro = new Slide();

                $rand = rand(11111,99999);
                $diretorio = "img/slides/";
                $ext = $imagem->guessClientExtension();
                $nomeArquivo = "_img_".$rand.".".$ext;
                $imagem->move($diretorio,$nomeArquivo);
                $registro->ordem = $ordemAtual + 1;
                $ordemAtual++;
                $registro->imagem = $diretorio.'/'.$nomeArquivo;
                $registro->save();
            }
        }

        $this->successMessage('Registro criado com sucesso!');

        return redirect()->route('admin.slides');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $registro = Slide::find($id);
        return view('admin.slides.editar', compact('registro'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function  atualizar(Request $request, $id){
        $registro = Slide::find($id);
        $dados = $request->all();
        $registro->titulo = $dados['titulo'];
        $registro->descricao = $dados['descricao'];
        $registro->link = $dados['link'];
        $registro->ordem = $dados['ordem'];
        $registro->publicado = $dados['publicado'];


        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/slides/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $registro->update();

        $this->successMessage('Registro atualizado com sucesso!');

        return redirect()->route('admin.slides');
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function deletar($id){
        $slide = Slide::find($id);
        $slide->delete();

        $this->successMessage('Registro deletado com sucesso!');
        return redirect()->route('admin.slides');
    }
}
