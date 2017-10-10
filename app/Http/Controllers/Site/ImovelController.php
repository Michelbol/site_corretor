<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imovel;

class ImovelController extends Controller
{
    public function index($id){
        $imovel = Imovel::find($id);
        $galeria = $imovel->galeria()->orderBy('ordem')->get();
        $direcaoImagem = ['center-align', 'left-align', 'rigth-align'];
        return view('site.imovel', compact('imovel', 'galeria', 'direcaoImagem'));
    }
}
