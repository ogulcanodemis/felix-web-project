<?php
namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PostTypes: string implements HasLabel, HasColor, HasIcon
{
    case PAGE = 'page';
    case POST = 'post';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::PAGE => 'Page',
            self::POST => 'Post',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PAGE => 'success',
            self::POST => 'info',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PAGE => 'iconoir-page',
            self::POST => 'iconoir-page-edit',
        };
    }
}
