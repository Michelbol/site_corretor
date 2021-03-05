<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imovel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $qtdImoveis = Imovel::where('publicar', 'sim')->count();
        return view('admin.principal.index', compact('qtdImoveis'));
    }
}
