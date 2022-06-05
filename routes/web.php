<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'middleware' => ['auth', 'role:admin|super admin'],
    'prefix'     => 'admin',
    'as'         => 'admin.'
], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    Route::resource('/users', '\App\Http\Controllers\Admin\UserController');

    Route::resource('/roles', '\App\Http\Controllers\Admin\RoleController');
    Route::put('/roles/{role}/attach/', [RoleController::class, 'attachPermissions'])->name('role.attachPermission');
    Route::put('/roles/{role}/detach/', [RoleController::class, 'detachPermissions'])->name('role.detachPermission');
    Route::resource('/permissions', '\App\Http\Controllers\Admin\PermissionController');
});
