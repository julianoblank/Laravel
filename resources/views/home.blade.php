@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Postagens</div>
                    <button type="button" class="btn btn-labeled btn-success col-2 m-2" onclick="window.location='{{ URL::to('posts/novo') }}'">
                        + Nova
                    </button>
                @if(count($posts)>0)
                    @foreach ($posts as $post)
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Ativa</th>
                                    <th scope="col">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->titulo}}</td>
                                    <td>{{$post->descricao}}</td>
                                    <td><img src="{{$post->imagem}}" class="card-img-top" alt="imagem_post"></td>
                                    <td>{{$post->ativa}}</td>
                                    <td><a href="{{ route('publicar', $post->id)}}" class="btn btn-primary">Publicar</a></td>
                                    <td><a href="{{ route('editar', $post->id)}}" class="btn btn-secondary">Editar</a></td>
                                    <td><a style="color:white" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{$post->id}}">Remover</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <form id="deletarPost" method="GET" action="{{route('destroy', ['post' => $post->id])}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Remover Postagem</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <p>Tem certeza que deseja remover esta postagem ?</p>
                                        </div>
                                        <input type="hidden" name="postId" id="postId" value="">
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Sim</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
            var recipientId = button.data('id');
            var modal = $(this);
            modal.find('#postId').val(recipientId);
        })
    });
</script>
@endsection
