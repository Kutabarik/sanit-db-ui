<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRuleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'table' => 'required|string',
            'type' => 'required|string',
            'field' => 'nullable|string',
            'fields' => 'nullable|string',
            'options' => 'nullable|string',
        ];
    }
}
