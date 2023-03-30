@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post as $post)
            <div class="card">
                <div class="card-header">{{$post->titulo}}</div>

                <div class="card-body">
                    <img src="{{$post->imagem}}" class="card-img-top" alt="imagem-post">
                    <p class="card-text">{{$post->descricao}} </p>
                </div>
            </div>
            @endforeach
            <a class="btn btn-danger mt-2" href="{{route('index')}}">Voltar</a>
        </div>
    </div>
</div>
@endsection
