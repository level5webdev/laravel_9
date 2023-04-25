@extends('layouts.app')
@section('title', 'Editar novo usúario {{ $user->name}}')
@section('content')
    <h1>Editat usuário {{ $user->name}}'</h1>

    @if ($errors->any())
        <ul class="erros">
            @foreach ($errors->all() as $erro)
                <li class="erro">{{ $erro }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('users.update', $user->id)}}" method="post">

        @csrf
        {{-- @method('PUT') --}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" id="name" placeholder="diginto seu nome" value="{{$user->name}}">

        <input type="email" name="email" id="email" placeholder="digite seu email" value="{{$user->email}}">

        <input type="password" name="password" id=" password" placeholder="digite sua senha">
        <button type="submit">Enviar</button>
    </form>
@endsection
