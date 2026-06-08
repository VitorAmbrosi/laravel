@extends('keep/_base')

@section('conteudo')
    <p>Bem vindo ao Little Keep!!!</p>
    <p><a href="{{ @route('keep.create') }}">+ Adicionar Nota</a></p>
    <p><a href="{{ @route('keep.trash') }}">Ver notas apagadas</a></p>
    <hr>

    @if (session('mensagem'))
        <div>{{ session('mensagem') }} 😎</div>
    @endif

    @foreach($notas as $nota)

        <div style="color: white; background-color:{{ $nota['cor'] }}; margin: 5px; padding-left: 5px;">
            {{ $nota['nota'] }}
            <br><br>

            Criada: {{ \Carbon\carbon::parse($nota['created_at']) -> diffForHumans() }}
            <br>

            @if ($nota['created_at'] != $nota['updated_at'])
                Editada: {{ \Carbon\carbon::parse($nota['updated_at']) -> diffForHumans() }}
            @endif
            <br><br>

            <a href="{{ route('keep.edit', $nota['id']) }}" style="text-decoration: none;">✏️</a>
            <a href="{{ route('keep.delete', $nota['id']) }}" style="text-decoration: none;">❌</a>
        </div>
        
    @endforeach
@endsection