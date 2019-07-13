@extends('layouts.app', [$selecionado = 'home'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>ID @foreach ($cartas as $c){{ $c->id }} @endforeach</h3></div>

              
                    
                <div class="card-body">
                    @if (count($cartas) ===1)
                    @foreach ($cartas as $c)
                    <form action="/atualizar/{{ $c->id }}" method="post">
                        @csrf
                        <div class="form-group row">
                                <label for="remetente" class="col-md-4 col-form-label text-md-right">Remetente</label>
                                <div class="col-md-6">
                                    <input id="remetente" type="text" class="form-control @error('remetente') is-invalid @enderror" name="remetente" value="{{ $c->remetente }}" autofocus>
                                    @error('remetente')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="destinatario" class="col-md-4 col-form-label text-md-right">Destinatario</label>
                                <div class="col-md-6">
                                    <input id="destinatario" type="text" class="form-control @error('destinatario') is-invalid @enderror" name="destinatario" value="{{ $c->destinatario }}" autofocus>
                                    @error('destinatario')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">Data</label>
                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control @error('data') is-invalid @enderror" name="data" value="{{ $c->data }}" autofocus>
                                    @error('data')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row ">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">CEP</label>
                            <div class="col-md-6">
                                <input id="cep" type="number" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ $c->cep }}" autofocus>
                                @error('cep')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="rastreio" class="col-md-4 col-form-label text-md-right">Rastreio</label>
                            <div class="col-md-6">
                                <input id="rastreio" type="string" class="form-control text-uppercase @error('rastreio') is-invalid @enderror" name="rastreio" value="{{ $c->rastreio }}" autofocus>
                                @error('rastreio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="preco" class="col-md-4 col-form-label text-md-right">Preço</label>
                            <div class="col-md-6">
                                <input id="preco" type="number" step="any" class="form-control @error('preco') is-invalid @enderror" name="preco" value="{{ $c->preco }}" autofocus>
                                @error('preco')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">Tipo</label>
                            <div class="col-md-6">
                                <select id="tipo" class="form-control" name="tipo">
                                    <option value="{{ $c->tipo }}">{{ $c->tipo }}</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Registrada">Registrada</option>
                                    <option value="Sedex">Sedex</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row offset-4">
                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="btn-enviar">
                                     <span class="" role="status" aria-hidden="true" id="btn-load"></span>
                                      Atualizar  
                                    </button>
                                </div>
                        </div>
                    </form>
                    <form action="/excluir/{{ $c->id }}">
                        <div class="form-group mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-danger" id="btn-excluir">
                                 <span class="" role="status" aria-hidden="true" id="btn-load-excluir"></span>
                                  Excluir  
                                </button>
                            </div>
                    </div>
                    </form>
                        </div>
                        
                    
                    @endforeach

                    @elseif(count($cartas) === 0)
                        Não há registros com essa id
                    @else
                        Confira se o banco de dados está funcionando normalmente    
                    @endif
                    
                </div>
                   
            </div>
        </div>
    </div>
</div>
@endsection
