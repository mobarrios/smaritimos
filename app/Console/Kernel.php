<?php

namespace App\Console;
use DB;
use \App\Http\Controllers\Admin;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Repositories\Admin\ItemsRepo;
use Mail;
use App\Http\Controllers\Admin\ItemsController;
use App\Entities\Admin\Items;


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


            $pv = new ItemsRepo();
            $pv->ItemsVencidos();
            
            $it = new Items();
            $v  =  $it->where('status','!=',7)->where('f_vencimiento','<=', date('Y-m-d'))->orderBy('f_vencimiento','DESC')->get();
            $cat = DB::table('categories')->where('main',1)->whereNotNull('mail')->get();

            foreach($cat as $c){

                Mail::send('mails.vto', ['porVencer'=> $pv, 'vencidos' => $v, 'cat_id' => $c->id], function($m) use ($c){
                         $m->from('help@coders.com.ar', 'Aviso de próximos vencimientos');
                         $m->cc($c->mail,'Servicios Maritimos')->subject('Vencimiento de Artículo!');
                });

            }

         })->dailyAt('08:00');

        
    }

   
}
