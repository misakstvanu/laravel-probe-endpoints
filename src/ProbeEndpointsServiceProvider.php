<?php

namespace Misakstvanu\LaravelProbeEndpoints;

class ProbeEndpointsServiceProvider extends \Illuminate\Support\ServiceProvider{
    public function boot() {
        $this->publishes([
            __DIR__.'/../config/probes.php' => config_path('probes.php'),
        ], 'laravel-probe-endpoints-config');
        $this->publishes([
            __DIR__.'/../routes/probes.php' => base_path('routes/probes.php'),
        ], 'laravel-probe-endpoints-routes');
    }

    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/probes.php', 'probes'
        );
        $this->loadRoutesFrom(__DIR__.'/../routes/probes.php');
    }
}