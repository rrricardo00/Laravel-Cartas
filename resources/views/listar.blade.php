@extends('layouts.app', [$selecionado = 'paginaAdicionar'])

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-center"><h3>Listando {{ $cartas->count()}} resultados de {{ $cartas->perPage() }} de um total de {{ $cartas->total()  }} </h3></div>
                    
                            @if (count($cartas)>=1 )
                            <table class="table table-hover table-borderless">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>REMETENTE</th>
                                            <th>DESTINATÁRIO</th>
                                            <th>DATA</th>
                                            <th>CEP</th>
                                            <th>RASTREIO</th>
                                            <th>TIPO</th>
                                            <th>PREÇO</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            @foreach ($cartas as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->remetente }}</td>
                                <td>{{ $c->destinatario }}</td>
                                <td>{{ $c->data }}</td>
                                <td>{{ $c->cep }}</td>
                                <td><a class="text-uppercase" target="_blank" href="http://www.linkcorreios.com.br/{{ $c->rastreio }}">{{ $c->rastreio }}</a></td>
                                <td>{{ $c->tipo }}</td>
                                <td>R${{ $c->preco }}</td>
                                <td>
                                    <a href="/atualizar/{{ $c->id }}" class="btn btn-sm btn-warning">Atualizar</a>
                                    <a href="/excluir/{{ $c->id }}" class="btn btn-sm btn-danger">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                            @elseif(count($cartas)===0)
                            Não há registros nesse referido período
                            @else
                            Consulte a conexão com seu banco de dados
                            @endif
                            
            </div>
            <div class="card-footer">
                {{ $cartas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
