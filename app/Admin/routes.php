<?php

use App\Admin\Controllers\ItemController;
use App\Admin\Controllers\LocationController;
use App\Admin\Controllers\RouteController;
use App\Admin\Controllers\SizeController;
use App\Admin\Controllers\StyleController;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('colors', \App\Admin\Controllers\ColorsController::class);
    $router->resource('sizes', SizeController::class);
    $router->resource('styles', StyleController::class);
    $router->resource('items', ItemController::class);
    $router->resource('routes', RouteController::class);
    $router->resource('shops', ShopController::class);
    $router->resource('packets', \App\Admin\Controllers\PacketController::class);



});
