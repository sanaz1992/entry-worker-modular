<?php

namespace Modules\Core\Helpers;


use Illuminate\Support\Str;

class CodeGeneratorHelper
{

    public static function generate(string $modelClass, string $column = 'code', string $prefix = '', int $padding = 4)
    {
        // Finding the largest previous code with prefix
        $lastCode = $modelClass::where($column, 'like', "$prefix%")
            ->orderBy($column, 'desc')
            ->value($column);

        $number = 1;

        if ($lastCode) {
            // getting numbers from the last code
            $lastNumber = (int) Str::afterLast($lastCode, '-');
            $number     = $lastNumber + 1;
        }

        $formatted = str_pad($number, $padding, '0', STR_PAD_LEFT);

        if ($prefix != '') {
            return $prefix . '-' . $formatted;
        } else {
            return $formatted;
        }
    }
}
