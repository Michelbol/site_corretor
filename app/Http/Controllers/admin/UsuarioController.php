<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Papel;

class UsuarioController extends Controller{
    public function login(Request $request){
        $dados = $request->all();

        if(Auth::attempt(['email'=>$dados['email'], 'password'=>$dados['password']])){
            \Session::flash('mensagem', ['msg'=>'Login realizado com sucesso!','class'=>'green white-text']);
            return redirect()->route('admin.principal');
        }
        \Session::flash('mensagem', ['msg'=>'Erro! Confira seus dados!','class'=>'red white-text']);
        return redirect()->route('admin.login');

    }

    public function sair(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index(){

        if(auth()->user()->can('usuario_listar')){
            $usuarios = User::all();
            return view('admin.usuarios.index', compact('usuarios'));
        }else{
            return redirect()->route('admin.principal');
        }

    }
    public function adicionar(){
        if(!auth()->user()->can('usuario_adicionar')){
            return view('admin.principal');
        }
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request){
        if(!auth()->user()->can('usuario_adicionar')){
            return view('admin.principal');
        }
        $dados = $request->all();

        $usuario = new User();

        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();

            \Session::flash('mensagem', ['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    public function editar($id){
        if(!auth()->user()->can('usuario_editar')){
            return view('admin.principal');
        }
        $usuario = User::find($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function  atualizar(Request $request, $id){
        if(!auth()->user()->can('usuario_editar')){
            return view('admin.principal');
        }
        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password'])>5){
            $dados['password'] = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
        }
        $usuario->update($dados);
        \Session::flash('mensagem', ['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admin.usuarios');
    }

    public function deletar($id){
        if(!auth()->user()->can('usuario_deletar')){
            return view('admin.principal');
        }
        User::find($id)->delete();
        return redirect()->route('admin.usuarios');
        \Session::flash('mensagem', ['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);
    }

    public function papel($id){
        if(!auth()->user()->can('usuario_deletar')){
            return view('admin.principal');
        }
        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admin.usuarios.papel', compact('usuario', 'papel'));
    }

    public function salvarPapel(Request $request, $id){
        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
        $usuario->adicionaPapel($papel);
        return redirect()->back();
    }
    public function removerPapel($id, $papel_id){
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();
    }
}
