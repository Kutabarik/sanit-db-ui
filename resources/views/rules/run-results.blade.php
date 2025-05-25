@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Rule Check Results</h1>

        @foreach($results as $table => $ruleResults)
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-2">{{ $table }}</h2>
                @foreach($ruleResults as $ruleName => $entries)
                    <div class="mb-4">
                        <h3 class="font-semibold text-gray-700">{{ $ruleName }}</h3>
                        @if (count($entries))
                            <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto">{{ json_encode($entries, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                        @else
                            <p class="text-sm text-green-600">No issues found.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
