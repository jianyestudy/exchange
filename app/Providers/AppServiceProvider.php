<?php

namespace App\Providers;

use App\Models\system;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (!Cache::has('platname')){
            Cache::put('platname', system::query()->where('key', 'platname')->value('value'));
        }

        if (!Cache::has('logo')){
            Cache::put('logo', system::query()->where('key', 'logo')->value('value'));
        }

        if (!Cache::has('telphone')){
            Cache::put('telphone', system::query()->where('key', 'telphone')->value('value'));
        }

        if (!Cache::has('description')){
            Cache::put('description', system::query()->where('key', 'description')->value('value'));
        }

        if (!Cache::has('url')){
            Cache::put('url', system::query()->where('key', 'url')->value('value'));
        }
    }
}
