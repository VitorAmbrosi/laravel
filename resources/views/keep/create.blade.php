@extends('keep/_base')

@section('conteudo')
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="post" action="{{ isset($nota) ? route('keep.edit', $nota['id']) : route('keep.create') }}">
        @csrf
        @if (isset($nota))
            @method('PUT')
        @endif
        <textarea name="nota">{{ old('nota', $nota['nota'] ?? '') }}</textarea> <!-- old() pega os dados antigos do servidor se der erro no formulário -->
        <br>
        <input type="color" name="cor" value="{{ old('cor', $nota['cor'] ?? '') }}">
        <br>
        <input type="submit" value="Gravar">
    </form>

    <a href="{{ route('keep.index') }}">Cancelar</a>

@endsection