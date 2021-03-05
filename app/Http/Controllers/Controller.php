<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successMessage(string $message)
    {
        Session::flash('mensagem', ['msg' => $message, 'class' => 'green white-text']);
    }

    public function errorMessage(string $message)
    {
        Session::flash('mensagem', ['msg' => $message, 'class' => 'red white-text']);
    }
}
