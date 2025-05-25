@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Run Rule Analysis</h1>

        <form action="{{ route('rules.run') }}" method="POST">
            @csrf
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Run</button>
        </form>
    </div>
@endsection
