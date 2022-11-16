<?php

namespace App\Console;

use App\Models\Paste;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

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
        $schedule->call(function (){

            $pastes = Paste::query()->orderByDesc('created_at')->get();

            foreach($pastes as $paste){

                Log::info($paste->expiration_time);

                if( (($paste->created_at->toDateTimeString())
                        <=
                    (Carbon::now()->subMinutes($paste->expiration_time)->toDateTimeString())
                    )
                && ($paste->expiration_time != 0)
                )
                {
                    $paste->delete();
                }
            }

        })->everyMinute();
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
