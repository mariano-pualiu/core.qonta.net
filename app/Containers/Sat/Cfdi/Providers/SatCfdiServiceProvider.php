<?php

namespace App\Containers\Sat\Cfdi\Providers;

use App\Ship\Parents\Providers\ServiceProvider as ParentServiceProvider;
use Lorisleiva\Actions\Facades\Actions;

final class SatCfdiServiceProvider extends ParentServiceProvider
{
    public function register(): void
    {
        Actions::registerRoutes([
            'app/Containers/Sat/Cfdi/UI/API/Actions/V33',
            'app/Containers/Sat/Cfdi/UI/API/Actions/V40',
        ]);
    }

    public function boot(): void
    {
    }
}
