<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\User\Entities\User;

// use Modules\User\Database\Factories\AddressFactory;

class Shift extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'is_night'
    ];

    public function getDateJalaliAttribute()
    {
        return verta($this->date)->format('Y/m/d');
    }

    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/m/d H:i');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function days(): HasMany
    {
        return $this->hasMany(ShiftDay::class);
    }
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'employee_shift',
            'employee_id'
        )->withTimestamps();
    }
}
