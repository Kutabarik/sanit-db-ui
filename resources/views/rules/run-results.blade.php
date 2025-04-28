@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Results</h1>

    @php
        $totalIssues = 0;
        foreach ($results as $types) {
            foreach ($types as $issues) {
                $totalIssues += count($issues);
            }
        }
    @endphp

    @if ($totalIssues === 0)
        <div class="bg-green-100 text-green-800 p-4 rounded">
            ✅ All rules passed!
        </div>
    @else
        <div class="mb-8 bg-red-100 text-red-800 p-4 rounded">
            ❗ {{ $totalIssues }} issues found
        </div>

        @foreach($results as $table => $types)
            <div class="mt-8">
                <h2 class="text-xl font-semibold">{{ $table }}</h2>

                @foreach($types as $type => $issues)
                    <div class="mt-4 p-4 rounded bg-gray-100 text-gray-800">
                        <h3 class="text-lg font-bold mb-4">{{ ucfirst($type) }} ({{ count($issues) }})</h3>

                        @foreach($issues as $issue)
                            <div class="bg-white p-6 rounded shadow mb-4">
                                <div class="mb-4">
                                    <p class="font-semibold text-red-600">{{ $issue['error'] }}</p>
                                </div>

                                <div class="mb-4">
                                    <h4 class="font-semibold text-gray-700">Row:</h4>
                                    <div class="bg-gray-50 p-3 rounded text-sm overflow-x-auto">
                                        <table class="table-auto w-full">
                                            @foreach($issue['row'] as $field => $value)
                                                <tr>
                                                    <td class="pr-4 font-medium text-gray-600">{{ $field }}</td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-semibold text-gray-700">Details:</h4>
                                    <div class="bg-gray-50 p-3 rounded text-sm overflow-x-auto">
                                        <table class="table-auto w-full">
                                            @foreach($issue['details'] as $key => $value)
                                                <tr>
                                                    <td class="pr-4 font-medium text-gray-600">{{ $key }}</td>
                                                    <td>
                                                        @if(is_array($value))
                                                            {{ implode(', ', $value) }}
                                                        @else
                                                            {{ $value }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif

    <div class="mt-8">
        <a href="{{ route('rules.run.show') }}" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Run again</a>
    </div>
</div>
@endsection

