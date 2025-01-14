<?php
namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum PostCommentStatus: string implements HasLabel, HasColor, HasIcon
{
    case OPEN = 'open';
    case CLOSED = 'closed';
    case ONLY_MEMBER = 'only_member';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::OPEN => 'Open',
            self::CLOSED => 'Closed',
            self::ONLY_MEMBER => 'Only Member',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::OPEN => 'success',
            self::CLOSED => 'gray',
            self::ONLY_MEMBER => 'warning',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::OPEN => 'heroicon-m-lock-open',
            self::CLOSED => 'heroicon-m-lock-closed',
            self::ONLY_MEMBER => 'heroicon-m-users',
        };
    }
}
