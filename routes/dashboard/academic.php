<?php

use App\Http\Controllers\Dashboard\Academic;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){
        Route::group(['middleware' => 'auth:academic', 'prefix' => 'academic', 'as' => 'academic.'], function () {
            Route::get('dashboard', Academic\DashboardController::class)->name('dashboard');
        });
        require __DIR__.'../../auth.php';
});
