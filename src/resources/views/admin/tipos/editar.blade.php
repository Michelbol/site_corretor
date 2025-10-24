@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <h2 class="center">Editar Tipos</h2>

            <div class="row">
                <nav>
                    <div class="nav-wrapper green">
                        <div class="col s12">
                            <a href="{{route('admin.principal') }}" class="breadcrumb">Início</a>
                            <a href="{{route('admin.tipos')}}" class="breadcrumb">Lista de Tipos</a>
                            <a class="breadcrumb">Editar Tipos</a>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="row">
                <form id="save-tipo" action="{{ route('admin.tipos.atualizar',$registro->id) }}" method="post">

                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    @include('admin.tipos._form')
                    <button class="btn blue">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('js/tipos/scripts.js') }}"></script>
@endpush