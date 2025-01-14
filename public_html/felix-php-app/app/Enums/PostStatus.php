<?php
namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PostStatus: string implements HasLabel, HasColor, HasIcon
{
    case DRAFT = 'draft';
    case PUBLISHED = 'published';
    case PLANNED = 'planned';
    case REVIEWING = 'reviewing';
    case TRASHED = 'trashed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISHED => 'Published',
            self::PLANNED => 'Planned',
            self::REVIEWING => 'Reviewing',
            self::TRASHED => 'Trashed',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::DRAFT => 'warning',
            self::PUBLISHED => 'success',
            self::PLANNED => 'primary',
            self::REVIEWING => 'info',
            self::TRASHED => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::DRAFT => 'heroicon-m-pencil-square',
            self::PUBLISHED => 'heroicon-m-eye',
            self::PLANNED => 'heroicon-m-calendar-days',
            self::REVIEWING => 'heroicon-m-eye',
            self::TRASHED => 'heroicon-m-trash',
        };
    }
}
