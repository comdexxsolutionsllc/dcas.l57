<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                'alex@elementalfusion.online',
            ]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Telescope::night();

        Telescope::filter(function (IncomingEntry $entry) {
            if ($this->app->environment() == 'development' || $this->app->environment() == 'local') {
                return true;
            }

            return $entry->isReportableException() || $entry->isFailedJob() || $entry->isScheduledTask() || $entry->hasMonitoredTag();
        });
    }
}
