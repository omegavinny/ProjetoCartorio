<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <title>Cartórios</title>
</head>
<body>
    <header class="bg-blue-900 py-4 text-gray-50">
        <div class="container flex justify-between mx-auto">
            <div>
                <h1 class="text-lg font-bold">
                    <a href="/cartorio">
                        <img src="{{ asset('images/brasao_branco.png') }}" alt="Prefeitura Municipal de São Vicente" class="h-12">
                    </a>
                </h1>
            </div>
            <div>
                <ul class="flex">
                    <li class="px-3 py-4">
                        <a href="/cartorio/imoveis" class="font-semibold">Imoveis</a>
                    </li>
                    <li class="px-3 py-4">
                        <a href="/cartorio/proprietarios" class="font-semibold">Proprietários</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main class="bg-gray-200 min-h-screen px-3">
        <div class="bg-white container min-h-screen mx-auto px-3 py-4 overflow-x-auto">
            @yield('content')
        </div>
    </main>
    <footer class="bg-blue-900 px-3 py-4 text-gray-50">
        <p class="text-center">&copy; Cartorio {{ date('Y') }}</p>
    </footer>
</body>
</html>
