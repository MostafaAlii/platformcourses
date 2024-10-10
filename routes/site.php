<?php

use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::group(['as' => 'site.'], function () {
            Route::get('/', Frontend\FrontendController::class)->name('home');
            Route::get('/courses' , Frontend\CourseController::class )->name('courses');
            Route::get('/courses/{id}' , [Frontend\CourseController::class , 'show'] )->name('courses.show');
            Route::get('/about' , [Frontend\AboutContactController::class , 'About'])->name('About');
            Route::get('/contact' , [Frontend\AboutContactController::class , 'Contact'])->name('Contact');
            Route::get('/cart' , Frontend\CartController::class )->name('Cart');
            Route::get('/courses/{id}/content' , Frontend\courseContentController::class )->name('courseContent');
        });

        require __DIR__ . '/auth.php';
    },
);
