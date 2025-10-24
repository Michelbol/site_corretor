@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="center">Lista de Tipos</h2>

        <div class="row">
            <nav>
                <div class="nav-wrapper green">
                    <div class="col s12">
                        <a href="{{ route('admin.principal') }}" class="breadcrumb">Início</a>
                        <a class="breadcrumb">Lista de Tipos</a>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->titulo }}</td>
                        <td>
                            <a class="btn waves-effect waves-light orange tooltipped" data-tooltip="Editar" href="{{ route('admin.tipos.editar', $registro->id) }}"><i class="large material-icons">edit</i></a>
                            <a class="btn waves-effect waves-light red tooltipped" data-tooltip="Deletar" href="javascript: if(confirm('Deletar esse registro?')){
                            window.location.href='{{route('admin.tipos.deletar', $registro->id)}}'}"><i class="large material-icons">delete</i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="row">
            <a class="btn blue" href="{{route('admin.tipos.adicionar')}}">Adicionar</a>
        </div>
    </div>
@endsection