<?php

use App\Http\Controllers\Web\BookingController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('change-language', function () {
    $language = Session::get('language', config('app.locale'));
    if ($language == 'en') {
        $language = 'vi';
    } else {
        $language = 'en';
    }
    Session::put('language', $language);
    return redirect()->back();
})->name('change-language');

Route::middleware('localization')->group(function () {

    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');
    Route::post('/signup', [AuthController::class, 'postSignup'])->name('signup.post');
    Route::post('/signin', [AuthController::class, 'postSignin'])->name('signin.post');

    Route::get('/signup', [FrontendController::class, 'signup'])->name('signup');
    Route::get('/signin', [FrontendController::class, 'signin'])->name('signin');

    Route::middleware(['auth'])->group(function () {
    });


    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/warranty', [FrontendController::class, 'warranty'])->name('warranty');
    Route::get('/about', [FrontendController::class, 'about'])->name('about');

    Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

    Route::get('/services', [FrontendController::class, 'services'])->name('services');

    Route::post('/booking/create', [BookingController::class, 'create'])->name('booking.post');
    Route::get('/booking', [FrontendController::class, 'booking'])->name('booking');

    Route::get('/', [FrontendController::class, 'home'])->name('home');
});


