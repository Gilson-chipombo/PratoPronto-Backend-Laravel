<form method="POST" action="/login">
    @csrf
    <input name="email" placeholder="Email">
    <input name="password" type="password" placeholder="Password">
    <button>Login</button>
</form>
