<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="about.css">
</head>
<body>
    @include('header')
    @yield('content')
    <script src="script.js"></script>
</body>
</html>
