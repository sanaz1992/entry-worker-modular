<?php

namespace Modules\Company\Rules;

class StoreChartNodeRules
{
    public static function rules()
    {
        return [
            'form.title' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }
}
