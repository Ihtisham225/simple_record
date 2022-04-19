<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .text-danger{
            color:red;
        }
    </style>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    <!-- Vue Script CDN -->
    <script src="https://unpkg.com/vue@next"></script>
</head>
<body>

    @yield('main-content')

    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>