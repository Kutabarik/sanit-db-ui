@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Rules</h1>

        <a href="{{ route('rules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Rule</a>

        @foreach($rules['tables'] as $table => $tableRules)
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-2">{{ $table }}</h2>
                <ul class="space-y-2">
                    @foreach($tableRules as $index => $rule)
                        <li class="flex items-start justify-between bg-gray-100 p-4 rounded">
                            <pre class="text-sm overflow-x-auto">{{ json_encode($rule, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                            <div class="flex flex-col space-y-2 ml-4">
                                <a href="{{ route('rules.edit', ['table' => $table, 'index' => $index]) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-center">Edit</a>
                                <form method="POST" action="{{ route('rules.destroy', ['table' => $table, 'index' => $index]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Delete?')">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
@endsection
