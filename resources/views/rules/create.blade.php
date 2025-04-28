@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Add New Rule</h1>

        <form method="POST" action="{{ route('rules.store') }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Table</label>
                <input type="text" name="table" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Type</label>
                <input type="text" name="type" class="w-full border rounded p-2"
                       placeholder="e.g. duplicate, format, etc." required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Field</label>
                <input type="text" name="field" class="w-full border rounded p-2" placeholder="e.g. email">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Fields</label>
                <input type="text" name="fields" class="w-full border rounded p-2" placeholder="e.g. email,name">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Options (JSON)</label>
                <textarea name="options" class="w-full border rounded p-2 h-32" placeholder="{\" option1\":
                \"value1\"}"></textarea>
            </div>

            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Save</button>
        </form>
    </div>
@endsection
