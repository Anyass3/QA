<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('head')

    @vite('resources/js/app.js')

</head>

<body class=" bg-light">

    <div class="container py-4 px-3 mx-auto">
        <div class="sticky-top bg-light">

            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand">QA</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </nav>
            <div class="container-fluid flex flex-wrap py-4">
                <button type="button" class="btn btn-primary btn-lg">Ask Question</button>
                <button type="button" class="btn btn-secondary btn-lg">Find question to answer</button>
            </div>
        </div>

        @yield('content')


    </div>


</body>

</html>
