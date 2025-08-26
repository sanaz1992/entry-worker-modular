<?php

namespace Modules\User\Rules;

use Illuminate\Validation\Rules\Enum;
use Modules\User\Enums\UserLevel;

class StoreUserRules
{
    public static function rules(): array
    {
        return  [
            'form.name'     => ['required', 'string', 'max:255'],
            'form.image'    => ['nullable', 'image', 'max:2048'],
            'form.mobile'   => ['required', 'string', 'max:11'],
            'form.password' => ['required', 'confirmed', 'min:6', 'string'],
            // 'form.level'    => ['required', new Enum(UserLevel::class)],
            'form.province_id' => ['required', 'exists:provinces,id'],
            'form.city_id' => ['required', 'exists:cities,id'],
            'form.address' => ['required', 'string', 'max:255'],
            'form.postal_code' => ['required', 'string', 'max:20']
        ];
    }
}
