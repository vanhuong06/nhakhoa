<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/doctor'], function (Router $router) {
    $router->bind('doctor', function ($id) {
        return app('Modules\Doctor\Repositories\DoctorRepository')->find($id);
    });
    $router->get('doctors', [
        'as' => 'admin.doctor.doctor.index',
        'uses' => 'DoctorController@index',
        'middleware' => 'can:doctor.doctors.index'
    ]);
    $router->get('doctors/create', [
        'as' => 'admin.doctor.doctor.create',
        'uses' => 'DoctorController@create',
        'middleware' => 'can:doctor.doctors.create'
    ]);
    $router->post('doctors', [
        'as' => 'admin.doctor.doctor.store',
        'uses' => 'DoctorController@store',
        'middleware' => 'can:doctor.doctors.create'
    ]);
    $router->get('doctors/{doctor}/edit', [
        'as' => 'admin.doctor.doctor.edit',
        'uses' => 'DoctorController@edit',
        'middleware' => 'can:doctor.doctors.edit'
    ]);
    $router->put('doctors/{doctor}', [
        'as' => 'admin.doctor.doctor.update',
        'uses' => 'DoctorController@update',
        'middleware' => 'can:doctor.doctors.edit'
    ]);
    $router->delete('doctors/{doctor}', [
        'as' => 'admin.doctor.doctor.destroy',
        'uses' => 'DoctorController@destroy',
        'middleware' => 'can:doctor.doctors.destroy'
    ]);
    $router->bind('lichkham', function ($id) {
        return app('Modules\Doctor\Repositories\LichKhamRepository')->find($id);
    });
    $router->get('lichkhams', [
        'as' => 'admin.doctor.lichkham.index',
        'uses' => 'LichKhamController@index',
        'middleware' => 'can:doctor.lichkhams.index'
    ]);
    $router->get('lichkhams/create', [
        'as' => 'admin.doctor.lichkham.create',
        'uses' => 'LichKhamController@create',
        'middleware' => 'can:doctor.lichkhams.create'
    ]);
    $router->post('lichkhams', [
        'as' => 'admin.doctor.lichkham.store',
        'uses' => 'LichKhamController@store',
        'middleware' => 'can:doctor.lichkhams.create'
    ]);
    $router->get('lichkhams/{lichkham}/edit', [
        'as' => 'admin.doctor.lichkham.edit',
        'uses' => 'LichKhamController@edit',
        'middleware' => 'can:doctor.lichkhams.edit'
    ]);
    $router->put('lichkhams/{lichkham}', [
        'as' => 'admin.doctor.lichkham.update',
        'uses' => 'LichKhamController@update',
        'middleware' => 'can:doctor.lichkhams.edit'
    ]);
    $router->delete('lichkhams/{lichkham}', [
        'as' => 'admin.doctor.lichkham.destroy',
        'uses' => 'LichKhamController@destroy',
        'middleware' => 'can:doctor.lichkhams.destroy'
    ]);
// append


});
