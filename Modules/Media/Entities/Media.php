<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = ['mediaable_type', 'mediaable_id', 'collection', 'file_name', 'thumbnail_path', 'origin_name', 'mime_type', 'disk'];

    public function mediaable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return Storage::disk($this->disk)->url($this->file_name);
    }

    public function getThumbnailUrl(string $size = 'original'): ?string
    {
        $images = json_decode($this->attributes['thumbnail_path'], true);
        $image = $images[$size] ?? $images['original'] ?? $this->file_name;

        return $image ? Storage::disk($this->disk)->url($image) : null;
    }
}
