<?php

namespace Modules\Company\Rules;

class UpdateShiftRules
{
    public static function rules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:255'],
            'form.is_night' => ['nullable']
        ];
    }
}
