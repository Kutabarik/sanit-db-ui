@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Rule: {{ $rule->name }}</h1>

        <form action="{{ route('rules.update', $rule->name) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            @include('rules.form-fields', ['rule' => $rule])
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
@endsection
