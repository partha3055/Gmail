<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Welcome {{ Auth::user()->name }}</h2>
    Name: {{ Auth::user()->name }}<br>
    Email: {{ Auth::user()->email }}<br>
    <a href="{{ route('logout') }}">Logout</a>
</body>

</html>
