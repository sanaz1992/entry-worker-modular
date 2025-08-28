<?php

namespace Modules\Company\Rules;

class StoreCompanyRules
{
    public static function rules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:255'],
            'form.manager_id' => ['required', 'exists:users,id'],
            'form.image' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
