<?php

namespace Hyder\FacadePattern;

use Hyder\FacadePattern\Console\Commands\MakeFacade;
use Hyder\FacadePattern\Console\Commands\MakeInterface;
use Hyder\FacadePattern\Console\Commands\MakeScaffold;
use Hyder\FacadePattern\Console\Commands\MakeService;
use Illuminate\Support\ServiceProvider;

class FacadePatternServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
              
        $this->commands([
            MakeScaffold::class,
            MakeFacade::class,
            MakeInterface::class,
            MakeService::class,
        ]);
  
        $this->publishes([
            __DIR__ . '/Providers/FacadeServiceProvider.php' => app_path('Providers/FacadeServiceProvider.php'),
        ], 'provider');
    }
}
