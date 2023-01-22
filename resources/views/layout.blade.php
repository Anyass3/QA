<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>

    @yield('head')

    @vite('resources/js/app.js')

</head>

<body class=" bg-light">

    <div class="container py-4 px-3 mx-auto">
        <div class="sticky-top bg-light">

            <nav class="navbar">
                <x-fluid class="container-fluid">
                    <a href="/" class="navbar-brand">QA</a>
                    @include('partials._search')
                </x-fluid>
            </nav>
            <x-fluid class="flex flex-wrap py-4">
                <a href='/questions/create' class="btn btn-primary btn-lg">Ask Question</a>
                <button type="button" class="btn btn-secondary btn-lg">Find question to answer</button>
            </x-fluid>
        </div>
        <x-fluid>
            @yield('content')
        </x-fluid>


    </div>

    <x-flash-message />

</body>

</html>
