@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Rule Check Results</h1>

        @foreach($results as $table => $ruleResults)
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-2">{{ ucfirst($table) }}</h2>

                @foreach($ruleResults as $ruleName => $entries)
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-700">{{ $ruleName }}</h3>

                        @if (count($entries))
                            <ul class="space-y-3 mt-3">
                                @foreach($entries as $entry)
                                    <li class="border border-red-300 bg-red-50 p-4 rounded text-sm">
                                        <p class="text-red-800 font-medium mb-1">❌ {{ $entry['error'] }}</p>

                                        @if (isset($entry['row']))
                                            <p class="font-semibold text-gray-700">Row:</p>
                                            <ul class="ml-4 text-gray-800 list-disc">
                                                @foreach($entry['row'] as $key => $val)
                                                    <li><strong>{{ $key }}:</strong> {{ $val }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        @if (isset($entry['duplicate_ids']))
                                            <p class="mt-2 text-sm ">Duplicates with IDs: {{ implode(', ', $entry['duplicate_ids']) }}</p>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-green-600 mt-2">✅ No issues found.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach

        <form method="POST" action="{{ route('sanit.delete') }}">
            @csrf
            <input type="hidden" name="results" value="{{ base64_encode(json_encode($results)) }}">
            <button type="submit" class="mb-6 bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700"
                    onclick="return confirm('Are you sure you want to delete all problematic entries?')">
                🗑 Delete All Bad Entries
            </button>
        </form>
    </div>
@endsection

