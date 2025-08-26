<?php

namespace Modules\User\Rules;

use Illuminate\Validation\Rules\Enum;
use Modules\User\Enums\UserLevel;

class UpdateUserRules
{
    public static function rules(int $userId): array
    {
        return array_merge(StoreUserRules::rules(), [
            'form.mobile' => ['nullable', 'string', 'max:11'],
            'form.password' => ['nullable', 'confirmed', 'min:6', 'string'],
        ]);
    }
}
