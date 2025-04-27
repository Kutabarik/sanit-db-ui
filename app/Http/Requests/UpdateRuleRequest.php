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
            'type' => 'required|string',
            'field' => 'nullable|string',
            'fields' => 'nullable|string',
            'options' => 'nullable|string',
        ];
    }
}
