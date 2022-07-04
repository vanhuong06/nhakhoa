<?php

namespace Modules\Doctor\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Doctor\Events\Handlers\RegisterDoctorSidebar;

class DoctorServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterDoctorSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('doctors', array_dot(trans('doctor::doctors')));
            $event->load('lichkhams', array_dot(trans('doctor::lichkhams')));
            // append translations


        });
    }

    public function boot()
    {
        $this->publishConfig('doctor', 'permissions');

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
            'Modules\Doctor\Repositories\DoctorRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentDoctorRepository(new \Modules\Doctor\Entities\Doctor());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheDoctorDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Doctor\Repositories\LichKhamRepository',
            function () {
                $repository = new \Modules\Doctor\Repositories\Eloquent\EloquentLichKhamRepository(new \Modules\Doctor\Entities\LichKham());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Doctor\Repositories\Cache\CacheLichKhamDecorator($repository);
            }
        );
// add bindings


    }
}
