

<form action="{{ route('user.create') }}" method="POST">
    @csrf
    @method('POST')
    <input type="text" name="name" placeholder="insira seu nome"> <br>
    <input type="email" name="email" placeholder="insira seu email"> <br>
    <input type="password" name="password"> <br>

    <button>Create</button>
</form>