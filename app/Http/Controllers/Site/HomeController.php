<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Imovel;
use App\Models\Slide;
use App\Models\Tipo;
use App\Models\Cidade;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(){
        $imoveis = Imovel::where('publicar', '=', 'Sim')->orderBy('id', 'desc')->paginate(20);
        $slides = Slide::where('publicado', '=', 'Sim')->orderBy('ordem')->get();
        $direcaoImagem = ['center-align', 'left-align', 'rigth-align'];
        $paginacao = true;
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();
        return view('site.home', compact('imoveis', 'slides', 'direcaoImagem', 'paginacao', 'tipos', 'cidades'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function busca(Request $request){
        $busca = $request->all();
        $paginacao = false;
        $tipos = Tipo::orderBy('titulo')->get();
        $cidades = Cidade::orderBy('nome')->get();
        if($busca['status'] == 'todos'){
            $testeStatus = [
                ['status', '<>', null]
            ];
        }else{
            $testeStatus = [
                ['status', '=', $busca['status']]
            ];
        }
        if($busca['tipo_id'] == 'todos'){
            $testeTipo = [
                ['tipo_id', '<>', null]
            ];
        }else{
            $testeTipo = [
                ['tipo_id', '=', $busca['tipo_id']]
            ];
        }
        if($busca['cidade_id'] == 'todos'){
            $testeCidade = [
                ['cidade_id', '<>', null]
            ];
        }else{
            $testeCidade = [
                ['cidade_id', '=', $busca['cidade_id']]
            ];
        }
        $testeDormitorios = [
            ['dormitorios','>=','0'],
            ['dormitorios','=','1'],
            ['dormitorios','=','2'],
            ['dormitorios','=','3'],
            ['dormitorios','>','3'],
        ];
        $numDorm = $busca['dormitorios'];
        $testeValor = [
            [['valor','>=','0']],
            [['valor','<=','500']],
            [['valor','>=','500'], ['valor', '<=', '1000']],
            [['valor','>=','1000'], ['valor', '<=', '5000']],
            [['valor','>=','5000'], ['valor', '<=', '10000']],
            [['valor','>=','10000'], ['valor', '<=', '50000']],
            [['valor','>=','50000'], ['valor', '<=', '100000']],
            [['valor','>=','100000'], ['valor', '<=', '200000']],
            [['valor','>=','200000'], ['valor', '<=', '300000']],
            [['valor','>=','300000'], ['valor', '<=', '500000']],
            [['valor','>=','500000'], ['valor', '<=', '1000000']],
            [['valor','>=','1000000']],
        ];
        $numValor = $busca['valor'];
        if($busca['bairro'] != ''){
            $testeBairro = [
                ['endereco', 'like', '%'.$busca['bairro'].'%']
            ];
        }else{
            $testeBairro = [
                ['endereco', '<>', null]
            ];
        }
        $imoveis = Imovel::where('publicar', '=', 'Sim')
            ->where($testeStatus)
            ->where($testeTipo)
            ->where($testeCidade)
            ->where([$testeDormitorios[$numDorm]])
            ->where($testeValor[$numValor])
            ->where($testeBairro)
            ->orderBy('id', 'desc')->get();
        return view('site.busca', compact('busca', 'imoveis', 'paginacao', 'tipos', 'cidades'));
    }
}
