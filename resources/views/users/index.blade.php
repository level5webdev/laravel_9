<h1>Listagem de usuários</h1>

<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }}
            {{ $user->email }}
            || <a href="{{ route('users.show', $user->id) }}">Vem usuário</a>
        </li>
    @endforeach
</ul>
