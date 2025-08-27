<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Media\Entities\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    protected $fillable = [
        'fname',
        'lname',
        'mobile',
        'email',
        'password',
        'level'
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'mobile_verified_at' => 'datetime',
            'password'           => 'hashed',
        ];
    }

    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }
    public function uploadDir(): string
    {
        return 'uploads/users/' . $this->id;
    }

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediaable');
    }

    public function getAvatarAttribute()
    {
        return $this->medias()->where('collection', 'avatar')->first();
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
