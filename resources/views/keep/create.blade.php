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
    
    <form method="post">
        @csrf
        <textarea name="nota"></textarea>
        <br>
        <input type="color" name="cor">
        <br>
        <input type="submit" value="Gravar">
    </form>

@endsection