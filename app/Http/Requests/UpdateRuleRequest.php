<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRuleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'table' => 'required|string',
            'type' => 'required|string',

            'field' => 'nullable|string',
            'fields' => 'nullable|array',
            'fields.*' => 'string',
            'regex' => 'nullable|string',
        ];
    }
}
