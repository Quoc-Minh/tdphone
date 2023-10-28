<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\RoleController;
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

    Route::prefix('/admin')->middleware(['auth', 'permission:sign in to admin'])->group(function () {
        Route::post('/employees', [EmployeeController::class, 'create'])->name('admin.employees.create');
        Route::get('/employees', [FrontendController::class, 'employees'])->name('admin.employees');

        Route::get('/roles/{id}/delete', [RoleController::class, 'delete'])->name('admin.roles.delete');
        Route::post('/roles/{id}/update', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::post('/roles', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::get('/roles', [FrontendController::class, 'roles'])->name('admin.roles');

        Route::get('/', [FrontendController::class, 'home'])->name('admin.home');
    });

    Route::get('/', function () {
        return view('web.pages.home');
    });
});


