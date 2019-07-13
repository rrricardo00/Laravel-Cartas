@extends('layouts.app', [$selecionado = 'paginaAdicionar'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Procurar por data</div>

                <div class="card-body">
                    <form action="/gerarpdf/data1/data2" method="POST">
                        @csrf
                            <div class="form-group row ">
                                <label for="procurardata1" class="col-md-4 col-form-label text-md-right">Início</label>
                                    <div class="col-md-6">
                                        <input id="procurardata1" type="date" class="form-control" name="procurardata1" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row ">
                                <label for="procurardata2" class="col-md-4 col-form-label text-md-right">Fim</label>
                                    <div class="col-md-6">
                                        <input id="procurardata2" type="date" class="form-control" name="procurardata2" autofocus>
                                    </div>
                            </div>
                            <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary form-control" id="btn-enviar">
                                         <span class="" role="status" aria-hidden="true" id="btn-load"></span>
                                          Gerar  
                                        </button>
                                    </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection