<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\View\View;
use Str;

class ImovelController extends Controller
{
    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function index($id){
        $imovel = Imovel::find($id);
        $imovel->visualizacoes += 1;
        $imovel->save();
        $galeria = $imovel->galeria()->orderBy('ordem')->get();
        $direcaoImagem = ['center-align', 'left-align', 'rigth-align'];
        $seo = [
            'titulo'=>$imovel->titulo,
            'descricao'=>$imovel->descricao,
            'imagem'=>asset($imovel->imagem),
            'url'=> route('site.imovel', [$imovel->id, Str::slug($imovel->titulo, '_')])
        ];
        return view('site.imovel', compact('imovel', 'galeria', 'direcaoImagem', 'seo'));
    }
}
