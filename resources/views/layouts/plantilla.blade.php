<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">


    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">


    

</head>
<body>


    @yield('content')


</body>
</html>