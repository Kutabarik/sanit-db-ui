@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Run Rule Analysis</h1>

        <form method="POST" action="{{ route('sanit.run') }}">
            @csrf

            <div class="space-y-4">
                @foreach($rules as $rule)
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="rules[]" value="{{ $rule->name }}" id="rule-{{ $rule->name }}" class="rounded border-gray-300">
                        <label for="rule-{{ $rule->name }}" class="text-sm text-gray-800">
                            <strong>{{ $rule->name }}</strong> ({{ $rule->type }} on {{ $rule->table }})
                        </label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="mt-6 bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Run Selected Rules
            </button>
        </form>
    </div>
@endsection

