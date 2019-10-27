@extends('adminlte::page')

@section('content')

<h1 class="text-uppercase"><strong>{{$book->name}}</strong></h1>

<div class="row">
    <div class="col-md-3">
        <p><img src="{{url("storage/img/$book->image")}}" alt="{{$book->name}}" class="img-thumbnail"></p>
    </div>
    <div class="container-fluid">
        <div class="col-md-5">
            <p><strong>Autor:</strong> {{$book->author}}</p>
        </div>
        <div class="col-md-5">
            <p><strong>Descrição:</strong> {{$book->description}}</p>
        </div>
    </div>        
</div>

<div class="form-group">
    <a href="{{route('books.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>  Voltar</a>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><span class="glyphicon glyphicon-remove"></span> Deletar livro</button>
</div>

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Deletar livro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir o livro?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{route('books.destroy', $book->id)}}">
                    {!! method_field('DELETE') !!}
                    {!! csrf_field() !!}
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> Deletar livro</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection 