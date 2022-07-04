<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/payment'], function (Router $router) {
    $router->bind('payment', function ($id) {
        return app('Modules\Payment\Repositories\PaymentRepository')->find($id);
    });
    $router->get('payments', [
        'as' => 'admin.payment.payment.index',
        'uses' => 'PaymentController@index',
        'middleware' => 'can:payment.payments.index'
    ]);
    $router->get('payments/create', [
        'as' => 'admin.payment.payment.create',
        'uses' => 'PaymentController@create',
        'middleware' => 'can:payment.payments.create'
    ]);
    $router->post('payments', [
        'as' => 'admin.payment.payment.store',
        'uses' => 'PaymentController@store',
        'middleware' => 'can:payment.payments.create'
    ]);
    $router->get('payments/{payment}/edit', [
        'as' => 'admin.payment.payment.edit',
        'uses' => 'PaymentController@edit',
        'middleware' => 'can:payment.payments.edit'
    ]);
    $router->put('payments/{payment}', [
        'as' => 'admin.payment.payment.update',
        'uses' => 'PaymentController@update',
        'middleware' => 'can:payment.payments.edit'
    ]);
    $router->delete('payments/{payment}', [
        'as' => 'admin.payment.payment.destroy',
        'uses' => 'PaymentController@destroy',
        'middleware' => 'can:payment.payments.destroy'
    ]);
// append

});
