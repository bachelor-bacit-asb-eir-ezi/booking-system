<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inkluderer Bootstrap CSS for stilsett og layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Inkluderer jQuery for interaktivitet og Bootstrap JavaScript-komponenter -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD5tr5Szkbe5F5Bf5zFNg5dk" crossorigin="anonymous"></script>

    <title>Document</title>
</head>


</head>
<body>

    @include('partials.navbar') <!-- Inkluderer navigasjonsbaren øverst på siden -->
    @yield("content")
    @include('partials.footer') <!-- Inkluderer footeren nederst på siden -->
    @include('partials.style') <!-- Inkluderer stilsettet som blir brukt -->
</body>
</html>
