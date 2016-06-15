<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class oauthClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    // public function boot()
    // {
    //     //
    // }
    protected $commands = [
       'vendor\client\CreateClient',
       'vendor\client\ListClients',
   ];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->commands($this->commands);
    }
}
