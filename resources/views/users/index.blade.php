@extends('layouts.app')
@section('title', 'Listagem de usuários')
@section('content')
    <h1>Listagem de usuários ( <a href="{{ route('users.create') }}">+ Criar um novo usúario</a>)</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }}
                {{ $user->email }}
                || <a href="{{ route('users.show', $user->id) }}">Vem usuário</a>
            </li>
        @endforeach
    </ul>

@endsection
