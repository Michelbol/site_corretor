<?php

namespace App\Http\Controllers\Site;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\View\View;
use Mail;
use Session;

class PaginaController extends Controller{
    /**
     * @return Application|Factory|View
     */
    public function sobre(){
        $pagina = Pagina::where('tipo', '=', 'sobre')->first();

        return view('site.sobre',compact('pagina'));
    }

    /**
     * @return Application|Factory|View
     */
    public function contato(){
        $pagina = Pagina::where('tipo', '=', 'contato')->first();

        return view('site.contato',compact('pagina'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function enviarContato(Request $request){
        $pagina = Pagina::where('tipo', '=', 'contato')->first();
        $email = $pagina->email;

        Mail::send('emails.contato', ['request'=>$request], function ($m) use($request, $email){
           $m->from($request['email'], $request['nome']);
           $m->replyTo($request['email'],$request['nome']);
           $m->subject("Contato pelo site");
           $m->to($email, 'Contato do Site');

        });

        Session::flash('mensagem', ['msg'=>'Contato enviado com sucesso!','class'=>'green white-text']);

        return redirect()->route('site.contato');
    }
}
