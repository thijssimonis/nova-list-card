<?php

namespace ThijsSimonis\NovaListCard;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class CardServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-list-card', __DIR__ . '/../dist/js/card.js');
        });
    }

    protected function routes(): void
    {
    }
}
