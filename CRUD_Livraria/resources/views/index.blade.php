@extends('template')

@section('content')

    <h1>Catálogo de Livros</h1>

    <a href="{{route('books.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>  Cadastrar</a>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Autor</th>
            <th>Capa</th>
            <th>Descrição</th>
            <th class="th-actions">Ações</th>
        </tr>

        @foreach ($books as $book)
        <tr>
            <td>{{$book->name}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->image}}</td>
            <td>{{$book->description}}</td>
            <td class="th-actions">
                <a href="{{route('books.edit', $book->id)}}" class="edit actions"><span class="glyphicon glyphicon-edit"></span></a>
                <a href="{{route('books.show', $book->id)}}" class="view actions"><span class="glyphicon glyphicon-eye-open"></span></a>
            </td>
        </tr>
        @endforeach 
        
    </table>

    {!! $books -> links() !!}

@endsection