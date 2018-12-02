<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ParticipanteModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      \App\Participante::observe(\App\Observer\ParticipanteObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
