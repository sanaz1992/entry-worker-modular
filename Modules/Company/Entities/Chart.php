<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Entities\User;

// use Modules\User\Database\Factories\AddressFactory;

class Chart extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'company_id', 'parent_id', 'user_id', 'refrence_id'];

    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/m/d H:i');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Chart::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(Chart::class, 'parent_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
