<?php

namespace App\Services;

class RuleBuilder
{
    public static function fromArray(array $data): array
    {
        $rule = [
            'type' => $data['type'],
        ];

        if (! empty($data['field'])) {
            $rule['field'] = $data['field'];
        }

        if (! empty($data['fields'])) {
            $rule['fields'] = array_map('trim', explode(',', $data['fields']));
        }

        if (! empty($data['options'])) {
            $options = json_decode($data['options'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                abort(400, 'Invalid JSON in Options field.');
            }
            $rule = array_merge($rule, $options);
        }

        return $rule;
    }
}
