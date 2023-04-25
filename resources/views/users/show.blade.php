@extends('layouts.app')

@section('title', 'Informação do usúario')
@section('content')

    <h1> Seja bem indo {{ $user->name }} </h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @method('DELETE') 
        @csrf
        <button type="submit ">Deletar</button>
    </form>

@endsection
