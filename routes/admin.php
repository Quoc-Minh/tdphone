<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProfileController;
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

    Route::get('/signout', [AuthController::class, 'signout'])->name('admin.signout');
    Route::post('/signup', [AuthController::class, 'postSignup'])->name('admin.signup.post');
    Route::post('/signin', [AuthController::class, 'postSignin'])->name('admin.signin.post');

    Route::get('/signup', [FrontendController::class, 'signup'])->name('admin.signup');
    Route::get('/signin', [FrontendController::class, 'signin'])->name('admin.signin');

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('admin.password.post');
        Route::get('/profile', [FrontendController::class, 'profile'])->name('admin.profile');

        //Components
        Route::get('/components/{id}/delete', [ComponentController::class, 'destroy'])->name('admin.components.delete');
        Route::post('/components/{id}/update', [ComponentController::class, 'update'])->name('admin.components.update');
        Route::get('/components/{id}/edit', [ComponentController::class, 'edit'])->name('admin.components.edit');
        Route::post('/components', [ComponentController::class, 'store'])->name('admin.components.store');
        Route::get('/components/create', [ComponentController::class, 'create'])->name('admin.components.create');
        Route::get('/components', [ComponentController::class, 'index'])->name('admin.components');

        //Services
        Route::get('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('admin.services.delete');
        Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');

        //Employees
        Route::get('/employees/{id}/delete', [EmployeeController::class, 'delete'])->name('admin.employees.delete');
        Route::post('/employees/{id}/update', [EmployeeController::class, 'update'])->name('admin.employees.update');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('admin.employees.create.post');
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('admin.employees.create');
        Route::get('/employees', [EmployeeController::class, 'index'])->name('admin.employees');

        //Roles
        Route::get('/roles/{id}/delete', [RoleController::class, 'delete'])->name('admin.roles.delete');
        Route::post('/roles/{id}/update', [RoleController::class, 'update'])->name('admin.roles.update');
        Route::post('/roles', [RoleController::class, 'create'])->name('admin.roles.create');
        Route::get('/roles', [FrontendController::class, 'roles'])->name('admin.roles');

        Route::get('/', [FrontendController::class, 'home'])->name('admin.home');
    });
});
