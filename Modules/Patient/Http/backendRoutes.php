<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/patient'], function (Router $router) {
    $router->bind('patient', function ($id) {
        return app('Modules\Patient\Repositories\PatientRepository')->find($id);
    });
    $router->get('patients', [
        'as' => 'admin.patient.patient.index',
        'uses' => 'PatientController@index',
        'middleware' => 'can:patient.patients.index'
    ]);
    $router->get('patients/create', [
        'as' => 'admin.patient.patient.create',
        'uses' => 'PatientController@create',
        'middleware' => 'can:patient.patients.create'
    ]);
    $router->post('patients', [
        'as' => 'admin.patient.patient.store',
        'uses' => 'PatientController@store',
        'middleware' => 'can:patient.patients.create'
    ]);
    $router->get('patients/{patient}/edit', [
        'as' => 'admin.patient.patient.edit',
        'uses' => 'PatientController@edit',
        'middleware' => 'can:patient.patients.edit'
    ]);
    $router->put('patients/{patient}', [
        'as' => 'admin.patient.patient.update',
        'uses' => 'PatientController@update',
        'middleware' => 'can:patient.patients.edit'
    ]);
    $router->delete('patients/{patient}', [
        'as' => 'admin.patient.patient.destroy',
        'uses' => 'PatientController@destroy',
        'middleware' => 'can:patient.patients.destroy'
    ]);
// append

});
