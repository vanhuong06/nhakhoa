<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/appointment'], function (Router $router) {
    $router->bind('appointment', function ($id) {
        return app('Modules\Appointment\Repositories\AppointmentRepository')->find($id);
    });
    $router->get('appointments', [
        'as' => 'admin.appointment.appointment.index',
        'uses' => 'AppointmentController@index',
        'middleware' => 'can:appointment.appointments.index'
    ]);
    $router->get('appointments/create', [
        'as' => 'admin.appointment.appointment.create',
        'uses' => 'AppointmentController@create',
        'middleware' => 'can:appointment.appointments.create'
    ]);
    $router->post('appointments', [
        'as' => 'admin.appointment.appointment.store',
        'uses' => 'AppointmentController@store',
        'middleware' => 'can:appointment.appointments.create'
    ]);
    $router->get('appointments/{appointment}/edit', [
        'as' => 'admin.appointment.appointment.edit',
        'uses' => 'AppointmentController@edit',
        'middleware' => 'can:appointment.appointments.edit'
    ]);
    $router->put('appointments/{appointment}', [
        'as' => 'admin.appointment.appointment.update',
        'uses' => 'AppointmentController@update',
        'middleware' => 'can:appointment.appointments.edit'
    ]);
    $router->delete('appointments/{appointment}', [
        'as' => 'admin.appointment.appointment.destroy',
        'uses' => 'AppointmentController@destroy',
        'middleware' => 'can:appointment.appointments.destroy'
    ]);
    $router->bind('historyappointment', function ($id) {
        return app('Modules\Appointment\Repositories\HistoryAppointmentRepository')->find($id);
    });
    $router->get('historyappointments', [
        'as' => 'admin.appointment.historyappointment.index',
        'uses' => 'HistoryAppointmentController@index',
        'middleware' => 'can:appointment.historyappointments.index'
    ]);
    $router->get('historyappointments/create', [
        'as' => 'admin.appointment.historyappointment.create',
        'uses' => 'HistoryAppointmentController@create',
        'middleware' => 'can:appointment.historyappointments.create'
    ]);
    $router->post('historyappointments', [
        'as' => 'admin.appointment.historyappointment.store',
        'uses' => 'HistoryAppointmentController@store',
        'middleware' => 'can:appointment.historyappointments.create'
    ]);
    $router->get('historyappointments/{historyappointment}/edit', [
        'as' => 'admin.appointment.historyappointment.edit',
        'uses' => 'HistoryAppointmentController@edit',
        'middleware' => 'can:appointment.historyappointments.edit'
    ]);
    $router->put('historyappointments/{historyappointment}', [
        'as' => 'admin.appointment.historyappointment.update',
        'uses' => 'HistoryAppointmentController@update',
        'middleware' => 'can:appointment.historyappointments.edit'
    ]);
    $router->delete('historyappointments/{historyappointment}', [
        'as' => 'admin.appointment.historyappointment.destroy',
        'uses' => 'HistoryAppointmentController@destroy',
        'middleware' => 'can:appointment.historyappointments.destroy'
    ]);
// append


});
