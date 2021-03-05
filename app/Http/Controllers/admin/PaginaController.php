<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\View\View;
use Session;

class PaginaController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $paginas = Pagina::all();

        return view('admin.Paginas.index', compact('paginas'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function editar($id){
        $pagina = Pagina::find($id);
        return view('admin.Paginas.editar', compact('pagina'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function atualizar(Request $request, $id){
        $dados = $request->all();
        $pagina = Pagina::find($id);
        $pagina->titulo = trim($dados['titulo']);
        $pagina->descricao = trim($dados['descricao']);
        $pagina->texto = trim($dados['texto']);
        if(isset($dados['email'])){
            $pagina->email = trim($dados['email']);
        }
        if(isset($dados['mapa']) && trim($dados['mapa']) != ''){
            $pagina->mapa = trim($dados['mapa']);
        }else{
            $pagina->mapa = null;
        }
        $file = $request->file('imagem');
        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/paginas/".$id."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $pagina->imagem = $diretorio.'/'.$nomeArquivo;
        }
        $pagina->update();
        $this->successMessage('Registro atualizado com sucesso!');
        return redirect()->route('admin.paginas');
    }

}
