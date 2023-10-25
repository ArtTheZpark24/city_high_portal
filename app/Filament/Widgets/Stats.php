<?php

namespace App\Filament\Widgets;

use App\Livewire\DashboardChart;
use App\Models\Students;
use App\Models\Teachers;
use Filament\Pages\Dashboard;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Students', Students::count())
            ->icon('heroicon-o-academic-cap')
            ->chart([Students::count()])
            ->description('Total number of students')
            
            ,
            Stat::make('Teachers', Teachers::count())
            ->icon('heroicon-o-users')
            ->chart([Students::count()])
            ->description('Total number of Teachers')
            ,
           
        ];
    }
}
