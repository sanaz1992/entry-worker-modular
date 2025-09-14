<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'company_id',
        'employee_id',
        'date',
        'check_in',
        'check_out',
        'worked_minutes',
        'description'
    ];
}
