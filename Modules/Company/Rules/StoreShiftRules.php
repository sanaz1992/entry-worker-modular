<?php

namespace Modules\Company\Rules;

class StoreShiftRules
{
    public static function rules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:255'],
            'form.start_date' => ['required', 'date'],
            'form.end_date' => ['required', 'date'],
            'form.start_time' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.end_time' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.break_start' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.break_end' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.is_night' => ['nullable']
        ];
    }
}
