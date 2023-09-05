<?php

namespace App\Console;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Código para borrar los datos de la tabla P_Entradas
            DB::table('p__entradas')->truncate();
            // Código para borrar los datos de la tabla P_Salidas
            DB::table('p__salidas')->truncate(); 
            // Código para borrar los datos de la tabla P_Devoluciones
            DB::table('p__devoluciones')->truncate();
        })->weekly()->sundays()->at('23:59');
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
