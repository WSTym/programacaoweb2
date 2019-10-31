@extends('layout.template')

@section('content')

    <h1>Lista de Compras</h1>

    <table class="table table-striped table-dark text-center">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($list as $item)
                <td>{{ $item[0] }}</td>
                @endforeach
            </tr>
            <tr>
                @foreach ($list as $item)
                <td>{{ $item[1] }}</td>
                @endforeach
            </tr>
            <tr>
                @foreach ($list as $item)
                <td>{{ $item[2] }}</td>
                @endforeach
            </tr>
            
        </tbody>
    
@endsection