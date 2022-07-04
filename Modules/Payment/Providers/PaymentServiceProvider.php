<?php

namespace Modules\Payment\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Payment\Events\Handlers\RegisterPaymentSidebar;

class PaymentServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterPaymentSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('payments', array_dot(trans('payment::payments')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('payment', 'permissions');

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
            'Modules\Payment\Repositories\PaymentRepository',
            function () {
                $repository = new \Modules\Payment\Repositories\Eloquent\EloquentPaymentRepository(new \Modules\Payment\Entities\Payment());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Payment\Repositories\Cache\CachePaymentDecorator($repository);
            }
        );
// add bindings

    }
}
