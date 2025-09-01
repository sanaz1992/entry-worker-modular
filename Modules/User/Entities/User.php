<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Company\Entities\Chart;
use Modules\Media\Entities\Media;
use Modules\User\Database\Factories\UserFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    use HasFactory;

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

    protected static function newFactory()
    {
        return UserFactory::new();
    }

    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }
    public function getCreatedAtJalaliAttribute()
    {
        return verta($this->created_at)->format('Y/m/d H:i');
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

    public function charts(): BelongsToMany
    {
        return $this->belongsToMany(Chart::class, 'company_user')
            ->withPivot('company_id')->withTimestamps();
    }
}
