<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/employee'], function (Router $router) {
    $router->bind('employee', function ($id) {
        return app('Modules\Employee\Repositories\EmployeeRepository')->find($id);
    });
    $router->get('employees', [
        'as' => 'admin.employee.employee.index',
        'uses' => 'EmployeeController@index',
        'middleware' => 'can:employee.employees.index'
    ]);
    $router->get('employees/create', [
        'as' => 'admin.employee.employee.create',
        'uses' => 'EmployeeController@create',
        'middleware' => 'can:employee.employees.create'
    ]);
    $router->post('employees', [
        'as' => 'admin.employee.employee.store',
        'uses' => 'EmployeeController@store',
        'middleware' => 'can:employee.employees.create'
    ]);
    $router->get('employees/{employee}/edit', [
        'as' => 'admin.employee.employee.edit',
        'uses' => 'EmployeeController@edit',
        'middleware' => 'can:employee.employees.edit'
    ]);
    $router->put('employees/{employee}', [
        'as' => 'admin.employee.employee.update',
        'uses' => 'EmployeeController@update',
        'middleware' => 'can:employee.employees.edit'
    ]);
    $router->delete('employees/{employee}', [
        'as' => 'admin.employee.employee.destroy',
        'uses' => 'EmployeeController@destroy',
        'middleware' => 'can:employee.employees.destroy'
    ]);
    $router->bind('time', function ($id) {
        return app('Modules\Employee\Repositories\timeRepository')->find($id);
    });
    $router->get('times', [
        'as' => 'admin.employee.time.index',
        'uses' => 'timeController@index',
        'middleware' => 'can:employee.times.index'
    ]);
    $router->get('times/create', [
        'as' => 'admin.employee.time.create',
        'uses' => 'timeController@create',
        'middleware' => 'can:employee.times.create'
    ]);
    $router->post('times', [
        'as' => 'admin.employee.time.store',
        'uses' => 'timeController@store',
        'middleware' => 'can:employee.times.create'
    ]);
    $router->get('times/{time}/edit', [
        'as' => 'admin.employee.time.edit',
        'uses' => 'timeController@edit',
        'middleware' => 'can:employee.times.edit'
    ]);
    $router->put('times/{time}', [
        'as' => 'admin.employee.time.update',
        'uses' => 'timeController@update',
        'middleware' => 'can:employee.times.edit'
    ]);
    $router->delete('times/{time}', [
        'as' => 'admin.employee.time.destroy',
        'uses' => 'timeController@destroy',
        'middleware' => 'can:employee.times.destroy'
    ]);
    $router->bind('department', function ($id) {
        return app('Modules\Employee\Repositories\DepartmentRepository')->find($id);
    });
    $router->get('departments', [
        'as' => 'admin.employee.department.index',
        'uses' => 'DepartmentController@index',
        'middleware' => 'can:employee.departments.index'
    ]);
    $router->get('departments/getResult', [
        'as' => 'admin.employee.department.results',
        'uses' => 'DepartmentController@getResult',
        'middleware' => 'can:employee.departments.index'
    ]);
    $router->get('departments/records', [
        'as' => 'admin.employee.department.records',
        'uses' => 'DepartmentController@records',
        'middleware' => 'can:employee.departments.index'
    ]);

    $router->get('departments/create', [
        'as' => 'admin.employee.department.create',
        'uses' => 'DepartmentController@create',
        'middleware' => 'can:employee.departments.create'
    ]);
    $router->post('departments', [
        'as' => 'admin.employee.department.store',
        'uses' => 'DepartmentController@store',
        'middleware' => 'can:employee.departments.create'
    ]);
    $router->get('departments/{department}/edit', [
        'as' => 'admin.employee.department.edit',
        'uses' => 'DepartmentController@edit',
        'middleware' => 'can:employee.departments.edit'
    ]);
    $router->put('departments/{department}', [
        'as' => 'admin.employee.department.update',
        'uses' => 'DepartmentController@update',
        'middleware' => 'can:employee.departments.edit'
    ]);
    $router->delete('departments/{department}', [
        'as' => 'admin.employee.department.destroy',
        'uses' => 'DepartmentController@destroy',
        'middleware' => 'can:employee.departments.destroy'
    ]);
    $router->bind('salary', function ($id) {
        return app('Modules\Employee\Repositories\SalaryRepository')->find($id);
    });
    $router->get('salaries', [
        'as' => 'admin.employee.salary.index',
        'uses' => 'SalaryController@index',
        'middleware' => 'can:employee.salaries.index'
    ]);
    $router->get('salaries/create', [
        'as' => 'admin.employee.salary.create',
        'uses' => 'SalaryController@create',
        'middleware' => 'can:employee.salaries.create'
    ]);
    $router->get('salaries/export', [
        'as' => 'admin.employee.salary.export',
        'uses' => 'SalaryController@export',
        'middleware' => 'can:employee.salaries.index'
    ]);

    $router->post('salaries', [
        'as' => 'admin.employee.salary.store',
        'uses' => 'SalaryController@store',
        'middleware' => 'can:employee.salaries.create'
    ]);
    $router->get('salaries/{salary}/edit', [
        'as' => 'admin.employee.salary.edit',
        'uses' => 'SalaryController@edit',
        'middleware' => 'can:employee.salaries.edit'
    ]);
    $router->put('salaries/{salary}', [
        'as' => 'admin.employee.salary.update',
        'uses' => 'SalaryController@update',
        'middleware' => 'can:employee.salaries.edit'
    ]);
    $router->delete('salaries/{salary}', [
        'as' => 'admin.employee.salary.destroy',
        'uses' => 'SalaryController@destroy',
        'middleware' => 'can:employee.salaries.destroy'
    ]);
// append




});
