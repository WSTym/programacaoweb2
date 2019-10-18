@extends('template')

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