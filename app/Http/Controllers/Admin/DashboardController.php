<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imovel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $qtdImoveis = Imovel::where('publicar', 'sim')->count();
        return view('admin.principal.index', compact('qtdImoveis'));
    }
}
