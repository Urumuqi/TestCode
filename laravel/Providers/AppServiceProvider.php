<?php

namespace App\Providers;

use App\EloquentModel\SfoChannel;
use App\EloquentModel\SfoBroker;
use App\EloquentModel\SfoModel;
use App\Observers\ChannelObserver;
use App\Observers\BrokerObserver;
use App\Observers\OperateRecord;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // add debug query log
        if (env('APP_DEBUG')) {
            DB::listen(function($query) {
                $sql = '';
                $splits = explode('?', $query->sql);
                $swith = count($splits) - 1;
                foreach ($splits as $cnt => $split) {
                    $sql .= $cnt < $swith ? ($split . "'".  $query->bindings[$cnt]. "'") : $split;
                }
                File::append(
                    storage_path('app/logs/sql-'. date('Y-m-d') .'.log'),
                    sprintf('date: %s | execution time: %d | sql: %s ;', date('Y-m-d H:i:s'), $query->time, $sql) . PHP_EOL
               );
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
