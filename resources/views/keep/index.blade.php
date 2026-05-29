@extends('keep/_base')

@section('conteudo')
    <p>Bem vindo ao Little Keep!!!</p>
    <p><a href="{{ @route('keep.create') }}">+ Adicionar Nota</a></p>
    <hr>
    @foreach($notas as $nota)
        <div style="color:{{ $nota['cor'] }}">- {{ $nota['nota'] }}</div>
    @endforeach
@endsection