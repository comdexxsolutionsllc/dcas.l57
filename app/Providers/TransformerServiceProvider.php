<?php

namespace App\Providers;

use App\Models\Roles\Customer;
use App\Transformers\UserTransformer;
use Flugg\Responder\Contracts\Transformers\TransformerResolver;
use Illuminate\Support\ServiceProvider;

/**
 * Class TransformerServiceProvider
 *
 * @package App\Providers
 */
class TransformerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make(TransformerResolver::class)->bind([
            Customer::class => UserTransformer::class,
        ]);
    }
}
