<?php

namespace Modules\Employee\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Employee\Events\Handlers\RegisterEmployeeSidebar;

class EmployeeServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterEmployeeSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('employees', array_dot(trans('employee::employees')));
            $event->load('times', array_dot(trans('employee::times')));
            $event->load('departments', array_dot(trans('employee::departments')));
            $event->load('salaries', array_dot(trans('employee::salaries')));
            // append translations




        });
    }

    public function boot()
    {
        $this->publishConfig('employee', 'permissions');

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
            'Modules\Employee\Repositories\EmployeeRepository',
            function () {
                $repository = new \Modules\Employee\Repositories\Eloquent\EloquentEmployeeRepository(new \Modules\Employee\Entities\Employee());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Employee\Repositories\Cache\CacheEmployeeDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Employee\Repositories\timeRepository',
            function () {
                $repository = new \Modules\Employee\Repositories\Eloquent\EloquenttimeRepository(new \Modules\Employee\Entities\time());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Employee\Repositories\Cache\CachetimeDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Employee\Repositories\DepartmentRepository',
            function () {
                $repository = new \Modules\Employee\Repositories\Eloquent\EloquentDepartmentRepository(new \Modules\Employee\Entities\Department());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Employee\Repositories\Cache\CacheDepartmentDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Employee\Repositories\SalaryRepository',
            function () {
                $repository = new \Modules\Employee\Repositories\Eloquent\EloquentSalaryRepository(new \Modules\Employee\Entities\Salary());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Employee\Repositories\Cache\CacheSalaryDecorator($repository);
            }
        );
// add bindings




    }
}
