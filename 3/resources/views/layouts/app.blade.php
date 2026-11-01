<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Warhammer 40,000')</title>

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>
<body>

    @yield('content')

    <script src="{{ mix('js/main.js') }}"></script>
</body>
</html>