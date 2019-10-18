@extends('template');

@section('content')

    @if (isset($book))
    <h1>Edição de cadastro</h1>
    @else
    <h1>Cadastro de livro</h1>
    @endif 

        <a href="{{route('books.index')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-chevron-left"></span>  Voltar</a>

    @if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    @if (isset($book))
    <form method="POST" action="{{ route('books.update', $book->id) }}" class="form">
            {!! method_field('PUT') !!}
    @else
    <form method="POST" action="{{ route('books.store') }}" class="form">
    @endif

            {!! csrf_field() !!}

            <div class="form-group">
                <input type="text" name="name" placeholder="Livro" class="form-control" value="{{$book->name or old('name')}}">
            </div>

            <div class="form-group">
                <input type="text" name="author" placeholder="Autor" class="form-control" value="{{$book->author or old('author') }}">
            </div>

            <div class="form-group">
                <input type="file" name="image" id="" class="form-control">
            </div>
            
            <div class="form-group">    
                <textarea name="description" placeholder="Descrição" id="" cols="30" rows="10" class="form-control">{{$book->description or old('description') }}</textarea>
            </div> 

            <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>{{isset($book) ? " Atualizar" : " Cadastrar"}}</button>
        </form>
    
@endsection