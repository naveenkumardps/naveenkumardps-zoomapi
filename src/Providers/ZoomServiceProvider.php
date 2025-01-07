<?php

namespace naveenkumardps\zoomapi\Providers;

class ZoomServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/zoom.php' => config_path('zoom.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/zoom.php', 'zoom');
    }
}