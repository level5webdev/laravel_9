
    @if ($errors->any())
        <ul class="erros">
            @foreach ($errors->all() as $erro)
                <li class="erro">{{ $erro }}</li>
            @endforeach
        </ul>
    @endif