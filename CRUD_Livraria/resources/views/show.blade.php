@extends('adminlte::page')

@section('content')

    <div style="width:75%; margin:auto">

        <h1 class="text-uppercase"><strong>{{ $book->name }}</strong></h1>

        <div class="row">
            <div class="col-md-3">
                <img src="{{ url("storage/img/$book->image") }}" alt="{{ $book->name }}" class="img-thumbnail">
            </div>
            <div class="col-md-6">
                <p><strong>Autor:</strong> {{ $book->author }}</p>
                <p><strong>Descrição:</strong> {{ $book->description }}</p>
            </div>        
        </div>

        <div style="margin-top:2rem">
            <a href="{{ route('books.index') }}" class="btn btn-primary">
                <span class="glyphicon glyphicon-chevron-left"></span>  Voltar
            </a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                <span class="glyphicon glyphicon-remove"></span> Excluir livro
            </button>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Excluir livro</h5>
                    </div>
                    <div class="modal-body">
                        <h3>Tem certeza que deseja excluir o livro?</h3>
                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                            {!! method_field('DELETE') !!}
                            {!! csrf_field() !!}
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                <span class="glyphicon glyphicon-chevron-left"></span> Não, volte!
                            </button>
                            <button class="btn btn-success"><span class="glyphicon glyphicon-ok">
                                </span> Sim, exclua!
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

    </div>

@endsection 