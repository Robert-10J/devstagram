<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DevStagram - @yield('title')</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow-md">
            <div class="container mx-auto flex justify-between">
                <h1 class="text-3xl font-black">DevStagram</h1>

                <nav class="flex gap-3 items-center">
                    <a href="login" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                </nav>
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('title')
            </h2>
            @yield('content')
        </main>

        <footer class="text-center p-5 font-bold text-gray-500">
            DevStagram {{ now()->year }}
        </footer>
    </body>
</html>
