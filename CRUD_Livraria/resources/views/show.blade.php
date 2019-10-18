@extends('template')

@section('content')

<h1>Livro: <strong>{{$book->name}}</strong></h1>
<p><strong>Autor:</strong> {{$book->author}}</p>
<p><strong>Capa:</strong> {{$book->image}}</p>
<p><strong>Descrição:</strong> {{$book->description}}</p>

<form method="POST" action="{{route('books.destroy', $book->id)}}">
    {!! method_field('DELETE') !!}
    {!! csrf_field() !!}
    <a href="{{route('books.index')}}" class="btn btn-primary"><span class="glyphicon glyphicon-chevron-left"></span>  Voltar</a>
    <button class="btn btn-danger "><span class="glyphicon glyphicon-remove"></span> Deletar livro</button>
</form>

@if (isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

@endsection