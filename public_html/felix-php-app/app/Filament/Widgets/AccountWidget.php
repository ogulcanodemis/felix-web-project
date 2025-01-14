<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Taxonomy;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class AccountWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();

        $totalPosts = Post::where('type', 'post')->get()->count();
        $totalMyPosts = Post::where('type', 'post')->where('author_id', $user->id)->get()->count();

        $totalPages = Post::where('type', 'page')->get()->count();
        $totalMyPages = Post::where('type', 'page')->where('author_id', $user->id)->get()->count();

        $totalCategories = Taxonomy::where('term_id', '1')->get()->count();

        return [
            Stat::make('Total Post Count', $totalPosts)
                ->description('Written by your total post count ' . $totalMyPosts)
                ->url(route('filament.admin.resources.posts.index')),
            Stat::make('Total Page Count', $totalPages)
                ->description('Created by your total Page count ' . $totalMyPages)
                ->url(route('filament.admin.resources.pages.index')),
            Stat::make('Total Category Count', $totalCategories)
                ->url(route('filament.admin.resources.categories.index')),
        ];
    }
}
