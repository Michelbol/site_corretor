@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Dashboard</h2>
        <div class="row">
            <div class="col s12 m2">
                <div class="card teal lighten-2">
                    <div class="card-content white-text">
                        <span class="card-title">Ativos</span>
                        <div class="card-dash">
                            <i class="small material-icons icon-dash">home</i>
                            <p class="quantity-dash">{{ $qtdImoveis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
