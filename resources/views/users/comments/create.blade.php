@extends('layouts.app')

@section('title', "Novo Comentário Para Usuário { $user->name }")

@section('content')
<h1 class="text-2xl font-semibold leading-tigh py-2"> Novo Comentário Para Usuário {{ $user->name }}</h1>

@include('includes.validations-form')

<form action="{{ route('comments.store', $user->id) }}" method="post" enctype="multipart/form-data">
    @include('users.comments._partials.form')
</form>

@endsection
