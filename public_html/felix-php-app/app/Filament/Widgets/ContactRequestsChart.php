<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\ContactRequest;
use Carbon\Carbon;

class ContactRequestsChart extends ChartWidget
{
    protected static ?string $heading = 'Contact Requests Answering Chart';

    protected static ?string $maxHeight = '300px';

    protected static ?array $options = [
        'scales' => [
            'x' => [
                'display' => false,
            ],
            'y' => [
                'display' => false,
            ],
        ],
    ];

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter ?? 'today';

        switch ($activeFilter) {
            case 'today':
                $start = Carbon::today();
                $end = Carbon::now();
                break;
            case 'week':
                $start = Carbon::now()->startOfWeek();
                $end = Carbon::now()->endOfWeek();
                break;
            case 'month':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'year':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default:
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
        }

        $requests = ContactRequest::whereBetween('created_at', [$start, $end])->get();

        $waitingCount = $requests->filter(fn($request) => !$request->reply_status)->count();
        $repliedCount = $requests->filter(fn($request) => $request->reply_status)->count();

        return [
            'labels' => [
                'Waiting for Response',
                'Replied',
            ],
            'datasets' => [
                [
                    'data' => [$waitingCount, $repliedCount],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                    ],
                    'hoverOffset' => 4
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
