<?php

namespace Modules\Patient\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Patient\Events\Handlers\RegisterPatientSidebar;

class PatientServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterPatientSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('patients', array_dot(trans('patient::patients')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('patient', 'permissions');

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
            'Modules\Patient\Repositories\PatientRepository',
            function () {
                $repository = new \Modules\Patient\Repositories\Eloquent\EloquentPatientRepository(new \Modules\Patient\Entities\Patient());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Patient\Repositories\Cache\CachePatientDecorator($repository);
            }
        );
// add bindings

    }
}
