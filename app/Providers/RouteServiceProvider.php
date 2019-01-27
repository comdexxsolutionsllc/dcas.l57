<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 *
 * @package App\Providers
 */
class RouteServiceProvider extends ServiceProvider
{

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapCustomerRoutes();

        $this->mapInternalRoutes();

        $this->mapVendorRoutes();

        $this->mapWhiteGloveRoutes();

        $this->mapLocalRoutes();
        //
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        $apiRoutes = [];

        foreach (\File::allFiles(base_path('routes')) as $route) {
            preg_match('/api\.(v[0-9]+)\.php/', $route->getPathName()) ? array_push($apiRoutes, $route->getPathname()) : null;
        }

        Route::prefix('api')->middleware('api')->namespace($this->namespace)->group(base_path('routes/api.php'));

        foreach ($apiRoutes as $api) {
            preg_match('/api\.v([0-9]+)\.php/', $api, $version);

            Route::group([
                'middleware' => ['api', 'api.version:' . $version[1]],
                'namespace'  => 'App\Http\Controllers\API\V' . $version[1],
                'prefix'     => 'api/v' . $version[1],
            ], function () use ($api) {
                require $api;
            });
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/web.php'));
    }

    /**
     * Define the "Customer" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCustomerRoutes()
    {
        Route::middleware([
            'web',
            'customer',
        ])->prefix('dashboard')->namespace($this->namespace)->group(base_path('routes/customer.php'));
    }

    /**
     * Define the "Internal" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapInternalRoutes()
    {
        Route::middleware([
            'web',
            'internal',
        ])->prefix('dashboard/internal')->namespace($this->namespace)->group(base_path('routes/internal.php'));
    }

    /**
     * Define the "Vendor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapVendorRoutes()
    {
        Route::middleware([
            'web',
            'vendor',
        ])->prefix('dashboard/vendor')->namespace($this->namespace)->group(base_path('routes/vendor.php'));
    }

    /**
     * Define the "White Gloves" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWhiteGloveRoutes()
    {
        Route::middleware([
            'web',
            'whitegloves',
        ])->prefix('dashboard/whitegloves')->namespace($this->namespace)->group(base_path('routes/whiteglove.php'));
    }

    /**
     * Define the "development/local" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLocalRoutes()
    {
        Route::middleware([
            'web',
            'local',
        ])->namespace($this->namespace)->group(base_path('routes/local.php'));
    }
}
