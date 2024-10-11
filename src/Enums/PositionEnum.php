<?php

namespace App\Enums;

use Symfony\Contracts\Translation\TranslatableInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

enum PositionEnum: string implements TranslatableInterface
{
    case Developer = "DEV";
    case Admin = "ADMIN";
    case Devops = "DEVOPS";
    case Designer = "DESIGNER";

    public function trans(TranslatorInterface $translator, ?string $locale = null): string
    {
        return match ($this) {
            self::Developer => "Программист",
            self::Admin => "Администратор",
            self::Devops => "Devops",
            self::Designer => "Дизайнер",
        };
    }
}
