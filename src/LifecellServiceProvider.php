<?php

namespace NotificationChannels\Lifecell;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class LifecellServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('lifecell', function ($app) {
                return new LifecellChannel;
            });
        });

    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
