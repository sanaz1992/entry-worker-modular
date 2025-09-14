<?php

namespace Modules\Company\Rules;

class StoreAttendanceRules
{
    public static function rules()
    {
        return [
            'form.company_id' => ['required', 'exists:companies,id'],
            'form.employee_id' => ['required', 'exists:users,id'],
            'form.date' => ['required', 'date'],
            'form.check_in' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.check_out' => ['required', 'regex:' . config("core.validations.time.regex")],
            'form.description' => ['nullable', 'string', 'max:255'],
        ];
    }
}
