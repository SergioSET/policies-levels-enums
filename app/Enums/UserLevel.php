<?php

namespace App\Enums;

enum UserLevel: int
{
    case Member = 0;
    case Contributor = 1;
    case Administrator = 2;

    public function label(): string
    {
        return static::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            UserLevel::Member => 'Miembro',
            UserLevel::Contributor => 'Contribuidor',
            UserLevel::Administrator => 'Administrador',
        };
    }

}
