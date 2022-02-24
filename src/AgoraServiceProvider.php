<?php

namespace Veldman\Agora;

use Illuminate\Support\ServiceProvider;

class AgoraServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->singleton(Agora::class, function ($app) {
            $appID = env('AGORA_APP_ID');
            $appCertificate = env('AGORA_APP_CERTIFICATE');

            return new Agora($appID, $appCertificate);
        });
    }
}