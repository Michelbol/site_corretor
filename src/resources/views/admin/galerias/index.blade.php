@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Galeria de Imagens</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a href="{{ route('admin.imoveis') }}" class="breadcrumb">Lista de Imoveis</a>
                        <a class="breadcrumb">Galeria de Imagens</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Ordem</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->ordem }}</td>
                        <td>{{ $registro->titulo }}</td>
                        <td>{{ $registro->descricao }}</td>
                        <td><img width="100" src="{{asset($registro->imagem)}}"></td>
                        <td>
                            <a class="btn orange waves-effect waves-light tooltipped" data-tooltip="Editar" href="{{ route('admin.galerias.editar', $registro->id) }}"><i class="large material-icons">edit</i></a>
                            <a class="btn red waves-effect waves-light tooltipped" data-tooltip="Deletar" href="javascript: if(confirm('Deletar esse registro?')){
                            window.location.href='{{route('admin.galerias.deletar', $registro->id)}}'}"><i class="large material-icons">delete</i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="row">
            <a class="btn blue" href="{{route('admin.galerias.adicionar', $imovel->id)}}">Adicionar</a>
        </div>
    </div>
@endsection