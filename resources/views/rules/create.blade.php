@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Create Rule</h1>

        <form action="{{ route('rules.store') }}" method="POST" class="space-y-4">
            @csrf
            @include('rules.form-fields')
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save</button>
        </form>
    </div>
@endsection
