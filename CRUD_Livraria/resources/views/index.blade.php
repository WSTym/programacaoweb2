@extends('adminlte::page')

@section('content')

    <h1>Catálogo de Livros</h1>

    <div class="form-group">
        <a href="{{route('books.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>  Cadastrar</a>
    </div>
    
    <div class="form-group">    
        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Autor</th>
                <th>Descrição</th> 
                <th>Ações</th>
            </tr>

            @foreach ($books as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->description}}</td> 
                <td>
                    <a href="{{route('books.edit', $book->id)}}" class="edit actions"><span class="glyphicon glyphicon-edit"></span></a>
                    <a href="{{route('books.show', $book->id)}}" class="view actions"><span class="glyphicon glyphicon-eye-open"></span></a>
                </td>
            </tr>
            @endforeach 
            
        </table>
    </div>

    {!! $books -> links() !!}

@endsection