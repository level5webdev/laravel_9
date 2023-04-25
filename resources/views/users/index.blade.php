@extends('layouts.app')
@section('title', 'Listagem de usuários')
@section('content')
    <h1>Listagem de usuários ( <a href="{{ route('users.create') }}">+ Criar um novo usúario</a>)</h1>

    <form action="{{route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar" >
        <button type="submit">Pesquisar</button>
    </form>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }}
                {{ $user->email }}
                || <a href="{{ route('users.show', $user->id) }}">Vem usuário</a>
                || <a href="{{ route('users.edit', $user->id) }}">Editar usúario</a>
            </li>
        @endforeach
    </ul>

@endsection
