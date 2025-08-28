<?php

namespace Modules\User\Rules;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Modules\User\Enums\UserLevel;

class UpdateUserRules
{
    public static function rules(int $userId): array
    {
        return array_merge(StoreUserRules::rules(), [
            'form.mobile' => ['nullable', 'string', 'max:11', Rule::unique('users', 'mobile')->ignore($userId)],
            'form.email' => ['nullable', 'string', 'min:5', 'max:255', Rule::unique('users', 'email')->ignore($userId)],
            'form.password' => ['nullable', 'confirmed', 'min:6', 'string'],
        ]);
    }
}
