<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('message:everyminute')
                        ->everyMinute()
                        ->appendOutputTo('scheduler.log');
        $schedule->command('message:everyfiveminute')
                        ->everyTwoMinutes()
                        ->appendOutputTo('scheduler.log');

    }

    public function scheduleTimeZone()
    {
        return 'Asia/Jakarta';
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
