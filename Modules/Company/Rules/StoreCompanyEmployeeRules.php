<?php

namespace Modules\Company\Rules;

class StoreCompanyEmployeeRules
{
    public static function rules()
    {
        return [
            'form.mobile' => ['required', 'string', 'min:3', 'max:255'],
            'form.fname' =>  ['required', 'string', 'min:3', 'max:255'],
            'form.lname' =>  ['required', 'string', 'min:3', 'max:255'],
            'form.chart_id' => ['required', 'exists:charts,id'],
            'form.shift_id' => ['required', 'exists:shifts,id'],
        ];
    }
}
