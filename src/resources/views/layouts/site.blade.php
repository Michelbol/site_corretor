<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}</title>
    <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">
    <!--Twitter Card Data -->
    <meta name="twitter:card" value="summary">

    <!--Open Graph Data -->
    <meta property="og:title" content="{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo') }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}"/>
    <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}"/>
    <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}"/>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">


</head>
<body id="app-layout">

    <header>
        @include('layouts._site._nav')
    </header>
    <main>
        @if(Session::has('mensagem'))
            <div class="container">
                <div class="row">
                    <div class="card {{Session::get('mensagem')['class']}}">
                        <div align="center" class="card-content">
                            {{Session::get('mensagem')['msg']}}
                        </div>
                    </div>

                </div>
            </div>
        @endif
        @yield('content')
    </main>

<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Souza Reis Corretor</h5>
                <p class="grey-text text-lighten-4">Facilitando a conquista do seu sonho.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociais</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.facebook.com/antonioasouzareis">Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.instagram.com/reisantoniosouza">Instagram</a></li>
                    <li><a class="grey-text text-lighten-3" target="_blank"href="https://twitter.com/Asouzareispr">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <a class="grey-text text-lighten-4 right" href="#!"></a>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
<script src="{{asset('lib/jquery-validation-1.19.0/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('lib/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js')}}"></script>
<script src="{{asset('js/init.js')}}"></script>
</body>
</html>
