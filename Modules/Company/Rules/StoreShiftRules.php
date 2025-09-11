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
            'form.start_time' => ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'form.end_time' => ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'form.break_start' => ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'form.break_end' => ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d$/'],
            'form.is_night' => ['nullable']
        ];
    }
}
