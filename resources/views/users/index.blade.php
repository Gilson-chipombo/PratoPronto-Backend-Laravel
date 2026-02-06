<a href="/user/create">Criar novo usuario</a>

@foreach($users as $user)
    <p>
        {{ $user->name }}
        <a href="user/{{ $user->id }}/edit">Editar</a>
        <form action="/user/{{ $user->id }}" method="post">
            @csrf
            @method('DELETE')

            <button>Apagar</button>
        </form>
    </p>
@endforeach