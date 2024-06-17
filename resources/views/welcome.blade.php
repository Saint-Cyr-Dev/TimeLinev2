<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'TimeLine') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <h1 class="text-4xl font-bold text-gray-900">Bienvenue sur {{ config('TimeLine', 'TimeLine') }}</h1>
            </div>

            <div class="mt-8">
                @if (Route::has('login'))
                    <div class="flex justify-center">
                        @auth
                            <a href="{{ url('/timeline') }}" class="inline-block mx-3 bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded transition duration-300">Continuer</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block mx-3 bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded transition duration-300">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block mx-3 bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded transition duration-300">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
