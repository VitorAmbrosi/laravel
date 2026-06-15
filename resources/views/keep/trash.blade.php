@extends('keep/_base')

@section('conteudo')
    <p>Lixeira do Little Keep!!!</p>
    <p><a href="{{ @route('keep.index') }}">< Voltar</a></p>
    <hr>

    <div style="display: flex; flex-direction: row; flex-wrap: wrap;">
    @foreach($notas as $nota)
    
        <div style="color: white; background-color:{{ $nota['cor'] }}; margin: 5px; padding-left: 5px; width: 600px;">
            {{ $nota['nota'] }}
            <br><br>
            @if ($nota['imagem'])
                <img src="{{ asset('storage/'.$nota['imagem']) }}" width="300px">

                <br><br>
            @endif
            

            Apagada: {{ \Carbon\carbon::parse($nota['deleted_at']) -> diffForHumans() }}
            <br><br>

            <a href="{{ @route('keep.trash.restore', $nota['id']) }}" style="text-decoration: none;">🔨 Restaurar</a>
            <br>
            <a href="{{ @route('keep.trash.delete' , $nota['id'] )}}" style="text-decoration: none;"> 🔥 Apagar em definitivo</a>
        </div>
        
    @endforeach
    </div>
@endsection