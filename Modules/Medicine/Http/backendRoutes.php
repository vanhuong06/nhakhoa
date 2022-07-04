<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/medicine'], function (Router $router) {
    $router->bind('medicine', function ($id) {
        return app('Modules\Medicine\Repositories\MedicineRepository')->find($id);
    });
    $router->get('medicines', [
        'as' => 'admin.medicine.medicine.index',
        'uses' => 'MedicineController@index',
        'middleware' => 'can:medicine.medicines.index'
    ]);
    $router->get('medicines/create', [
        'as' => 'admin.medicine.medicine.create',
        'uses' => 'MedicineController@create',
        'middleware' => 'can:medicine.medicines.create'
    ]);
    $router->post('medicines', [
        'as' => 'admin.medicine.medicine.store',
        'uses' => 'MedicineController@store',
        'middleware' => 'can:medicine.medicines.create'
    ]);
    $router->get('medicines/{medicine}/edit', [
        'as' => 'admin.medicine.medicine.edit',
        'uses' => 'MedicineController@edit',
        'middleware' => 'can:medicine.medicines.edit'
    ]);
    $router->put('medicines/{medicine}', [
        'as' => 'admin.medicine.medicine.update',
        'uses' => 'MedicineController@update',
        'middleware' => 'can:medicine.medicines.edit'
    ]);
    $router->delete('medicines/{medicine}', [
        'as' => 'admin.medicine.medicine.destroy',
        'uses' => 'MedicineController@destroy',
        'middleware' => 'can:medicine.medicines.destroy'
    ]);
    $router->bind('danhsach', function ($id) {
        return app('Modules\Medicine\Repositories\DanhSachRepository')->find($id);
    });
    $router->get('danhsaches', [
        'as' => 'admin.medicine.danhsach.index',
        'uses' => 'DanhSachController@index',
        'middleware' => 'can:medicine.danhsaches.index'
    ]);
    $router->get('danhsaches/create', [
        'as' => 'admin.medicine.danhsach.create',
        'uses' => 'DanhSachController@create',
        'middleware' => 'can:medicine.danhsaches.create'
    ]);
    $router->post('danhsaches', [
        'as' => 'admin.medicine.danhsach.store',
        'uses' => 'DanhSachController@store',
        'middleware' => 'can:medicine.danhsaches.create'
    ]);
    $router->get('danhsaches/{danhsach}/edit', [
        'as' => 'admin.medicine.danhsach.edit',
        'uses' => 'DanhSachController@edit',
        'middleware' => 'can:medicine.danhsaches.edit'
    ]);
    $router->put('danhsaches/{danhsach}', [
        'as' => 'admin.medicine.danhsach.update',
        'uses' => 'DanhSachController@update',
        'middleware' => 'can:medicine.danhsaches.edit'
    ]);
    $router->delete('danhsaches/{danhsach}', [
        'as' => 'admin.medicine.danhsach.destroy',
        'uses' => 'DanhSachController@destroy',
        'middleware' => 'can:medicine.danhsaches.destroy'
    ]);

    $router->bind('medicinelist', function ($id) {
        return app('Modules\Medicine\Repositories\MedicineListRepository')->find($id);
    });
    $router->get('medicinelists', [
        'as' => 'admin.medicine.medicinelist.index',
        'uses' => 'MedicineListController@index',
        'middleware' => 'can:medicine.medicinelists.index'
    ]);
    $router->get('medicinelists/create', [
        'as' => 'admin.medicine.medicinelist.create',
        'uses' => 'MedicineListController@create',
        'middleware' => 'can:medicine.medicinelists.create'
    ]);
    $router->post('medicinelists', [
        'as' => 'admin.medicine.medicinelist.store',
        'uses' => 'MedicineListController@store',
        'middleware' => 'can:medicine.medicinelists.create'
    ]);
    $router->get('medicinelists/{medicinelist}/edit', [
        'as' => 'admin.medicine.medicinelist.edit',
        'uses' => 'MedicineListController@edit',
        'middleware' => 'can:medicine.medicinelists.edit'
    ]);
    $router->put('medicinelists/{medicinelist}', [
        'as' => 'admin.medicine.medicinelist.update',
        'uses' => 'MedicineListController@update',
        'middleware' => 'can:medicine.medicinelists.edit'
    ]);
    $router->delete('medicinelists/{medicinelist}', [
        'as' => 'admin.medicine.medicinelist.destroy',
        'uses' => 'MedicineListController@destroy',
        'middleware' => 'can:medicine.medicinelists.destroy'
    ]);
    $router->bind('manage', function ($id) {
        return app('Modules\Medicine\Repositories\ManageRepository')->find($id);
    });
    $router->get('manages', [
        'as' => 'admin.medicine.manage.index',
        'uses' => 'ManageController@index',
        'middleware' => 'can:medicine.manages.index'
    ]);
    $router->get('manages/create', [
        'as' => 'admin.medicine.manage.create',
        'uses' => 'ManageController@create',
        'middleware' => 'can:medicine.manages.create'
    ]);
    $router->post('manages', [
        'as' => 'admin.medicine.manage.store',
        'uses' => 'ManageController@store',
        'middleware' => 'can:medicine.manages.create'
    ]);
    $router->get('manages/{manage}/edit', [
        'as' => 'admin.medicine.manage.edit',
        'uses' => 'ManageController@edit',
        'middleware' => 'can:medicine.manages.edit'
    ]);
    $router->put('manages/{manage}', [
        'as' => 'admin.medicine.manage.update',
        'uses' => 'ManageController@update',
        'middleware' => 'can:medicine.manages.edit'
    ]);
    $router->delete('manages/{manage}', [
        'as' => 'admin.medicine.manage.destroy',
        'uses' => 'ManageController@destroy',
        'middleware' => 'can:medicine.manages.destroy'
    ]);
// append





});
