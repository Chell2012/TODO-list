<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6HgH56nX0yBDz7tSuW32h3r3kz6f4j9abfrn9fXb67AN7DFlk9Ba8y9DeH" crossorigin="anonymous">
</head>
<body>
<div id="app">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb6KSu5LA/6v7jJ3gD3p+Q6A4LO4kVXzGqg6k36Z1o8P0Nq4X" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0Lr+XzAWZt5BsUq5r5z5D3D8H+z2R3g5i5u5D8+HXw2kB9w" crossorigin="anonymous"></script>
</body>
</html>
