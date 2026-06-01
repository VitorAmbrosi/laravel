@extends('keep/_base')

@section('conteudo')
    <p>Bem vindo ao Little Keep!!!</p>
    <p><a href="{{ @route('keep.create') }}">+ Adicionar Nota</a></p>
    <hr>

    @if (session('mensagem'))
        <div>{{ session('mensagem') }} 😎</div>
    @endif

    @foreach($notas as $nota)
        <div style="border: 1px solid; color:{{ $nota['cor'] }}; margin: 5px; padding-left: 5px;">
            - {{ $nota['nota'] }}
            ( {{ \Carbon\carbon::parse($nota['created_at']) -> diffForHumans() }} )
            <a href="{{ route('keep.edit', $nota['id']) }}" style="text-decoration: none;">✏️</a>
            <a href="{{ route('keep.delete', $nota['id']) }}" style="text-decoration: none;">❌</a>
        </div>
        
    @endforeach
@endsection