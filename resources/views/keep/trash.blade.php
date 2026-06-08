@extends('keep/_base')

@section('conteudo')
    <p>Lixeira do Little Keep!!!</p>
    <p><a href="{{ @route('keep.index') }}">< Voltar</a></p>
    <hr>

    @foreach($notas as $nota)
    
        <div style="color: white; background-color:{{ $nota['cor'] }}; margin: 5px; padding-left: 5px;">
            {{ $nota['nota'] }}
            <br><br>

            Apagada: {{ \Carbon\carbon::parse($nota['deleted_at']) -> diffForHumans() }}
            <br>

            <a href="{{ @route('keep.trash.restore', $nota['id']) }}" style="text-decoration: none;">🔨</a>
        </div>
        
    @endforeach
@endsection