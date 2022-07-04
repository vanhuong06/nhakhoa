<?php

namespace Modules\Invoice\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Invoice\Events\Handlers\RegisterInvoiceSidebar;

class InvoiceServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterInvoiceSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('invoices', array_dot(trans('invoice::invoices')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('invoice', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Invoice\Repositories\InvoiceRepository',
            function () {
                $repository = new \Modules\Invoice\Repositories\Eloquent\EloquentInvoiceRepository(new \Modules\Invoice\Entities\Invoice());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Invoice\Repositories\Cache\CacheInvoiceDecorator($repository);
            }
        );
// add bindings

    }
}
