@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>
                <div class="card-body">
                    @if(count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="card" style="width: 18rem;">
                                <img src="{{$post->imagem}}" class="card-img-top" alt="imagem_post">
                                <div class="card-body">
                                    <h5 class="card-title">{{$post->titulo}}</h5>
                                    <p class="card-text">{{$post->descricao}}</p>
                                    <a href="{{ route('postagem', $post->id)}}" class="btn btn-primary">Abrir postagem</a>
                                </div>
                            </div>
                            <br/>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
