@extends('keep/_base')

@section('conteudo')
<p>Apagra nota</p>
<p>Realmete deseja apagar esta nota?</p>

<p style="border: 1px solid; color:{{ $nota['cor'] }}; padding: 5px;">{{ Str::limit($nota['nota'], 50) }}</p>
 @if ($nota['imagem'])
    <img src="{{ asset('storage/'.$nota['imagem']) }}" width="300px">

    <br><br>
@endif

<form method="post" action="{{ route('keep.delete', $nota['id']) }}">
    @csrf
    @method('delete')
    <input type="submit" value="Apagar">
</form>
<a href="{{ route('keep.index') }}">Cancelar</a>

@endsection