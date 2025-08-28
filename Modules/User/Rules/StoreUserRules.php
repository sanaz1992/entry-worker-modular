<?php

namespace Modules\User\Rules;

use Illuminate\Validation\Rules\Enum;
use Modules\User\Enums\UserLevel;

class StoreUserRules
{
    public static function rules(): array
    {
        return  [
           'form.fname' => ['required', 'string', 'min:3', 'max:255'],
            'form.lname' => ['required', 'string', 'min:3', 'max:255'],
            'form.email' => ['nullable', 'email', 'min:5', 'max:255', 'unique:users,email'],
            'form.mobile' => ['required', 'string', 'min:3', 'max:255', 'unique:users,mobile'],
            'form.password' => ['required', 'confirmed', 'min:6', 'string'],
            'form.image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
