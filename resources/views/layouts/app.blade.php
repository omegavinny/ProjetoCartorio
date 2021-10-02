<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <title>Cartórios</title>
</head>
<body>
    <header class="bg-blue-900 px-3 py-4">
        <div class="container mx-auto">
            <div class="flex">
                <div>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/brasao_branco.png') }}" alt="Prefeitura Municipal de São Vicente" class="h-12">
                    </a>
                </div>

                <div class="w-full">
                    <div class="flex justify-between">
                        <div class="flex"></div>
                        <div class="flex">
                            <a href="{{ route('login') }}" class="font-semibold hover:text-white px-2 py-3 text-gray-50">Entrar</a>
                            <a href="{{ route('register') }}" class="font-semibold hover:text-white px-2 py-3 text-gray-50">Cadastro</a>
                        </div>
                    </div>
                </div>
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
