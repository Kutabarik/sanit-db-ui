@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Rules</h1>

        <a href="{{ route('rules.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Rule</a>

        @if (count($rules))
            <ul class="mt-6 space-y-4">
                @foreach($rules as $rule)
                    <li class="bg-gray-100 p-4 rounded flex justify-between items-start">
                        <div class="w-full">
                            <div class="font-semibold text-lg mb-2">{{ $rule->name }}</div>

                            <ul class="text-sm space-y-1">
                                @foreach($rule->toArray() as $key => $value)
                                    @if (!is_null($value) && $value !== '' && $value !== [])
                                        <li>
                                            <span class="font-medium text-gray-700">{{ ucfirst(str_replace('_', ' ', $key)) }}:</span>
                                            @if (is_array($value))
                                                {{ implode(', ', $value) }}
                                            @else
                                                {{ $value }}
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex flex-col items-end space-y-2 ml-4">
                            <a href="{{ route('rules.edit', $rule->name) }}"
                               class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-center">Edit</a>

                            <form method="POST" action="{{ route('rules.destroy', $rule->name) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        onclick="return confirm('Delete this rule?')">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-4 text-gray-600">No rules found.</p>
        @endif
    </div>
@endsection

