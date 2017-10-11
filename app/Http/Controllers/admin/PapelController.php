<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Papel;

class PapelController extends Controller{
    public function index(){
        $registros = Papel::all();
        return view('admin.papel.index', compact('registros'));
    }

    public function adicionar(){
        return view('admin.papel.adicionar');
    }
}
