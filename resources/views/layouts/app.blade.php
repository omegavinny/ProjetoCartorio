<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <title>Cartórios</title>
</head>
<body>
    <header class="bg-gray-800 px-3 py-4 text-gray-50">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1>
                    <a href="/cartorio">Cartório</a>
                </h1>
            </div>
            <div>
                <a href="#">Login</a>
            </div>
        </div>
    </header>
    <main class="bg-gray-100 min-h-screen px-3">
        <div class="bg-white container min-h-screen mx-auto px-3 py-4 overflow-x-auto">
            @yield('content')
        </div>
    </main>
    <footer class="bg-gray-800 px-3 py-4 text-gray-50">
        <p class="text-center">&copy; Cartorio {{ date('Y') }}</p>
    </footer>
</body>
</html>
