<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{


    protected $commands = [
        \App\Console\Commands\GreetCommand::class,
        \App\Console\Commands\LogmeCommand::class,
    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {

        $schedule->command('log:me')->everyMinute();
        // $schedule->command('inspire')->hourly();
        // $schedule->command("inspire")->everyMinute();
        // $schedule->command("inspire")->everyFiveMinutes();
        // $schedule->command("inspire")->everyTenMinutes();
        // $schedule->command("inspire")->everyFifteenMinutes();
        // $schedule->command("inspire")->everyThirtyMinutes();
        // $schedule->command("inspire")->hourly();
        // $schedule->command("inspire")->daily();
        // $schedule->command("inspire")->twiceDaily(1, 13);
        // $schedule->command("inspire")->weekly();
        // $schedule->command("inspire")->monthly();
        // $schedule->command("inspire")->yearly();

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
