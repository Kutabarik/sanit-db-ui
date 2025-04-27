@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Edit Rule</h1>

        <form method="POST" action="{{ route('rules.update', ['table' => $table, 'index' => $index]) }}"
              class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium mb-1">Type</label>
                <input type="text" name="type" value="{{ old('type', $rule['type'] ?? '') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Field (если одно поле)</label>
                <input type="text" name="field" value="{{ old('field', $rule['field'] ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Fields (если несколько полей через запятую)</label>
                <input type="text" name="fields"
                       value="{{ old('fields', isset($rule['fields']) ? implode(',', $rule['fields']) : '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Options (JSON-формат)</label>
                <textarea name="options"
                          class="w-full border rounded p-2 h-32">{{ old('options', json_encode(array_diff_key($rule, array_flip(['type', 'field', 'fields'])), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) }}</textarea>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
