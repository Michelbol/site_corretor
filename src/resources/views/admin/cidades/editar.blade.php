@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <h2 class="center">Editar Cidades</h2>

            <div class="row">
                <nav>
                    <div class="nav-wrapper green">
                        <div class="col s12">
                            <a href="{{route('admin.principal') }}" class="breadcrumb">Início</a>
                            <a href="{{route('admin.cidades')}}" class="breadcrumb">Lista de Cidades</a>
                            <a class="breadcrumb">Editar Tipos</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <form id="form-cidades" action="{{ route('admin.cidades.atualizar',$registro->id) }}" method="post">

                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    @include('admin.cidades._form')
                    <button class="btn blue">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/cidades/scripts.js') }}"></script>
@endpush