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
        <main class="bg-gray-200 min-h-screen">
            <div class="bg-white min-h-screen md:mx-auto px-4 py-5 md:w-1/4">
                <img src="{{ asset('images/brasao.gif') }}" alt="Prefeitura Municipal de São Vicente" class="mx-auto py-4 w-1/2">

                <h2 class="py-3 text-center">IPTU / Cartório</h2>

                @yield('content')

                <div class="py-4 text-center">
                    @if (Route::currentRouteName() != 'login')
                        <a href="{{ route('login') }}" class="block hover:underline py-2 text-blue-600">Já tenho cadastro</a>
                    @endif

                    @if (Route::currentRouteName() != 'register')
                        <a href="{{ route('register') }}" class="block hover:underline py-2 text-blue-600">Não tenho cadastro</a>
                    @endif
                    <a href="{{ route('passwords.forgot') }}" class="block hover:underline py-2 text-blue-600">Esqueci minha senha</a>
                </div>
            </div>
        </main>
    </body>
</html>
