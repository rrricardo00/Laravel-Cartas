@extends('layouts.app', [$selecionado = 'home'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem vindo {{ Auth::user()->name }}. O que deseja fazer?</div>

                <div class="card-body">
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action"><a href="/adicionar">Adicionar Carta</a></li>
                        <li class="list-group-item list-group-item-action"><a href="/listar">Listagem Completa</a></li>
                        <li class="list-group-item list-group-item-action"><a href="/procurar">Procurar ID</a></li>
                        <li class="list-group-item list-group-item-action"><a href="/procurardata">Procurar Data</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
