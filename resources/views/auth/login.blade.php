<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
</head>
<body>
    @if (session()->has('login'))
        {{ session('login') }}
    @endif

    @if (session()->has('register'))
        {{ session('register') }}
    @endif

    @guest
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">LOGİN</button>
    </form>
@endguest

@auth
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@endauth

</body>
</html>