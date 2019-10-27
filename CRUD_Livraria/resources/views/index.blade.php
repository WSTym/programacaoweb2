@extends('adminlte::page')

@section('content')

    <div style="width:75%; margin:auto">

        <h1>Catálogo de Livros</h1>

        <div style="margin-bottom:2rem">
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span>  Cadastrar</a>
        </div>

        <div class="form-group">    
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Descrição</th> 
                    <th class="text-center">Ações</th>
                </tr>

                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->description }}</td> 
                    <td class="text-center">
                        <a href="{{ route('books.edit', $book->id) }}">
                            <span class="glyphicon glyphicon-edit" style="margin-right:.5rem"></span>
                        </a> 
                        <a href="{{ route('books.show', $book->id) }}">
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </a> 
                    </td>
                </tr>
                @endforeach                
            </table>
        </div>

        {!! $books -> links() !!}

    </div>

@endsection