@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nova postagem</div>
                <div class="card-body">
                    <span id="success_message"></span>
                    <form method="POST" id="formAjax">
                        <div class="form-group">
                          <label for="inputTitulo">Título</label>
                          <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Digite o Título">
                        </div>
                        <div class="form-group">
                          <label for="inputDescricao">Descrição</label>
                          <textarea class="form-control" id="inputDescricao" name="descricao" required rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputImagem">Link da Imagem</label>
                            <input type="text" class="form-control" id="inputImagem" name="imagem" placeholder="Digite o link da imagem"  required>
                        </div>
                        <button type="submit" id="btnAjax" class="btn btn-success mt-2">Salvar</button>
                        <a class="btn btn-danger mt-2" href="{{route ('home')}}">Voltar</a>
                    </form>
                    <div class="form-group mt-4" id="process" style="display:none;">
                        <div class="progress">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="">
                </div>
            </div>
        </div>
    </div>
</div>
@component('ajax',['method'=>'POST', 'route'=> route('store'), 'novo' => true])
@endcomponent
@endsection
