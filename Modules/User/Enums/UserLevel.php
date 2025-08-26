<?php

namespace Modules\User\Enums;

enum UserLevel: string
{
    case USER   = 'user';
    case ADMIN  = 'admin';
    case SELLER = 'seller';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function labels(): array
    {
        return [
            self::USER->value   => 'کاربر معمولی',
            self::ADMIN->value  => 'مدیر سیستم',
            self::SELLER->value => 'نماینده فروش',
        ];
    }

    public function label(): string
    {
        return self::labels()[$this->value];
    }
}
