<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// use Modules\User\Database\Factories\AddressFactory;

class ShiftDay extends Model
{
    protected $fillable = [
        'shift_id',
        'day_of_week',
        'date',
        'start_time',
        'end_time',
        'break_start',
        'break_end',
    ];

    public function getDateJalaliAttribute()
    {
        return verta($this->date)->format('Y/m/d');
    }

    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/m/d H:i');
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
}
