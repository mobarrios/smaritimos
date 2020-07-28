<?php

namespace App\Console;
use DB;
use App\Http\Controllers\Admin\ItemsController as itemsController; 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('inspire')
         //        ->hourly();

         $schedule->call(function(){

            $itemsController->sendMail();

         })->dailyAt('00:00');
    }
}
