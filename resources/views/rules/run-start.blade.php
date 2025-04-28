@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 text-center">

    <form method="POST" action="{{ route('rules.run') }}">
        @csrf
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Run
        </button>
    </form>
</div>
@endsection
