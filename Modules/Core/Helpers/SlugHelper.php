<?php
namespace Modules\Core\Helpers;

class SlugHelper
{

    public static function generate(string $modelClass, string $slug, string $column = 'slug', int $ignoreId = null)
    {
        $baseSlug = $slug = self::persianSlug($slug);
        $i        = 1;
        while (self::slugExits($modelClass, $slug, $column, $ignoreId)) {
            $slug = $baseSlug . '-' . $i++;
        }
        return $slug;
    }

    public static function slugExits(string $modelClass, string $slug, string $column = 'slug', int $ignoreId = null)
    {
        $query = $modelClass::where($column, $slug);
        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }
        return $query->exists();
    }

    public static function persianSlug($text)
    {
        $text = trim($text);
        $text = preg_replace('/[^\p{Arabic}a-zA-Z0-9\s]+/u', '', $text); // حذف علامت‌ها
        $text = preg_replace('/\s+/u', '-', $text);                      // فاصله = خط فاصله
        return $text;
    }
}
