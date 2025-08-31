<?php

namespace Modules\Company\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Media\Entities\Media;
use Modules\User\Entities\User;

// use Modules\User\Database\Factories\AddressFactory;

class Company extends Model
{
    protected $fillable = ['title', 'slug', 'manager_id'];

    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/m/d H:i');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function uploadDir(): string
    {
        return 'uploads/companies/' . $this->id;
    }
    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
    public function getLogoAttribute()
    {
        return $this->medias()->where('collection', 'logo')->first();
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function charts(): HasMany
    {
        return $this->hasMany(Chart::class);
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'company_user')
            ->withPivot('chart_id');
    }
}
