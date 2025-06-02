<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules Manager</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-4 px-6 flex justify-between items-center">
            <h1 class="text-lg font-semibold">Rules Manager</h1>
            <div class="space-x-4">
                <a href="{{ route('rules.index') }}" class="text-blue-500 hover:underline">Manage Rules</a>
                <a href="{{ route('sanit.showRun') }}" class="text-blue-500 hover:underline">Run Rules</a>
            </div>
        </div>
    </header>

    <main class="flex-1 py-8">
        @if (session('success'))
        <div class="max-w-4xl mx-auto mb-6 px-6 py-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="max-w-4xl mx-auto mb-6 px-6 py-4 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t mt-8 py-4 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} Rules Manager
    </footer>

</body>

</html>
