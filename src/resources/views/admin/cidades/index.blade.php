@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Lista de Cidades</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Lista de Cidades</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Estado</th>
                    <th>Sigla do Estado</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nome }}</td>
                        <td>{{ $registro->estado }}</td>
                        <td>{{ $registro->sigla_estado }}</td>
                        <td>
                            <a class="btn waves-effect waves-light orange tooltipped" data-tooltip="Editar" href="{{ route('admin.cidades.editar', $registro->id) }}"><i class="large material-icons">edit</i></a>
                            <a class="btn red waves-effect waves-light tooltipped" data-tooltip="Deletar" href="javascript: if(confirm('Deletar esse registro?')){
                            window.location.href='{{route('admin.cidades.deletar', $registro->id)}}'}"><i class="large material-icons">delete</i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="row">
            <a class="btn blue" href="{{route('admin.cidades.adicionar')}}">Adicionar</a>
        </div>
    </div>
@endsection