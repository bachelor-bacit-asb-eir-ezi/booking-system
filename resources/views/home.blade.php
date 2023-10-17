<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <p>You are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @else
    <div>
        <h2>Registrer Bruker</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="phone_number" placeholder="Phone Number">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>
    </div>

    <div>
        <h2>Logg Inn</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="login_email" placeholder="Email">
            <input type="password" name="login_password" placeholder="Password">
            <button type="submit">Logg Inn</button>
        </form>
    </div>

    @endauth



    
</body>
</html>