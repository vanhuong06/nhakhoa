<?php

namespace Modules\Medicine\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Medicine\Events\Handlers\RegisterMedicineSidebar;

class MedicineServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterMedicineSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('medicines', array_dot(trans('medicine::medicines')));
            $event->load('danhsaches', array_dot(trans('medicine::danhsaches')));
            $event->load('medicinelists', array_dot(trans('medicine::medicinelists')));
            $event->load('manages', array_dot(trans('medicine::manages')));
            // append translations





        });
    }

    public function boot()
    {
        $this->publishConfig('medicine', 'permissions');

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
            'Modules\Medicine\Repositories\MedicineRepository',
            function () {
                $repository = new \Modules\Medicine\Repositories\Eloquent\EloquentMedicineRepository(new \Modules\Medicine\Entities\Medicine());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Medicine\Repositories\Cache\CacheMedicineDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Medicine\Repositories\ManageRepository',
            function () {
                $repository = new \Modules\Medicine\Repositories\Eloquent\EloquentManageRepository(new \Modules\Medicine\Entities\Manage());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Medicine\Repositories\Cache\CacheManageDecorator($repository);
            }
        );
// add bindings





    }
}
