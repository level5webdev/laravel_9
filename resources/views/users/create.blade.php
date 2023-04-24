@extends('layouts.app')
@section('title', 'Novo usuário')
@section('content')
    <h1>Novo usuário'</h1>

    @if ($errors->any())
        <ul class="erros">
            @foreach ($errors->all() as $erro)
                <li class="erro">{{ $erro }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="diginto seu nome" value="{{old('name')}}">

        <input type="email" name="email" id="email" placeholder="digite seu email" value="{{old('email')}}">

        <input type="password" name="password" id=" password" placeholder="digite sua senha">
        <button type="submit">Enviar</button>
    </form>
@endsection
