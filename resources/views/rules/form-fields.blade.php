<div>
    <label class="block font-semibold">Name</label>
    <input name="name" type="text" value="{{ old('name', $rule->name ?? '') }}" class="w-full border rounded p-2" required>
</div>

<div>
    <label class="block font-semibold">Table</label>
    <input name="table" type="text" value="{{ old('table', $rule->table ?? '') }}" class="w-full border rounded p-2" required>
</div>

<div>
    <label class="block font-semibold">Type</label>
    <select name="type" id="rule-type" class="w-full border rounded p-2" required>
        @foreach(['is_null', 'regex', 'email', 'duplicates'] as $type)
            <option value="{{ $type }}" @selected(old('type', $rule->type ?? '') === $type)>{{ $type }}</option>
        @endforeach
    </select>
</div>

<div id="field-group" class="hidden">
    <label class="block font-semibold">Field</label>
    <input name="field" type="text" value="{{ old('field', $rule->field ?? '') }}" class="w-full border rounded p-2">
</div>

<div id="fields-group" class="hidden">
    <label class="block font-semibold">Fields (comma separated)</label>
    <input name="fields" type="text" value="{{ old('fields', is_array($rule->fields ?? null) ? implode(',', $rule->fields) : '') }}" class="w-full border rounded p-2">
</div>

<div id="regex-group" class="hidden">
    <label class="block font-semibold">Regex</label>
    <input name="regex" type="text" value="{{ old('regex', $rule->regex ?? '') }}" class="w-full border rounded p-2">
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const typeSelect = document.getElementById('rule-type');
    const toggleFields = () => {
        const type = typeSelect.value;

        document.getElementById('field-group').classList.toggle('hidden', !['is_null', 'regex', 'email'].includes(type));
        document.getElementById('fields-group').classList.toggle('hidden', type !== 'duplicates');
        document.getElementById('regex-group').classList.toggle('hidden', type !== 'regex');
    };

    typeSelect.addEventListener('change', toggleFields);
    toggleFields();
});
</script>

