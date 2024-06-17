<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">

    @vite('resources/css/app.css') 

</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white">
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-300">Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        @auth
            <div class="mb-6">
                @include('partials.post-form') 
            </div>
        @endauth
        <div class="bg-white p-6 rounded-lg shadow-md">
            @include('partials.post-list', ['posts' => $posts]) 
        </div>
    </div>

</body>
</html>
