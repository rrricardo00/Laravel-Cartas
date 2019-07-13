@extends('layouts.app', [$selecionado = 'paginaAdicionar'])

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Procurar por ID</div>
                    <div class="card-body">
                        <form action="/procurar/id" method="POST">
                            @csrf
                                <div class="form-group row ">
                                    <label for="procurar" class="col-md-4 col-form-label text-md-right">Procurar</label>
                                        <div class="col-md-6">
                                            <input id="procurar" type="string" class="form-control text-uppercase" name="procurar" autofocus>
                                        </div>
                                </div>
                                <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary form-control" id="btn-enviar">
                                             <span class="" role="status" aria-hidden="true" id="btn-load"></span>
                                              Procurar  
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