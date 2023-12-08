<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReceiptController;
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

        //Appointments
        Route::get('/appointments/{id}/delete', [AppointmentController::class, 'destroy'])->name('admin.appointments.delete');
        Route::post('/appointments/{id}/update', [AppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::post('/appointments/create', [AppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments');

        //Receipts
        Route::get('/receipts/{id}/issueinvoice', [ReceiptController::class, 'issueInvoice'])->name('admin.receipts.issueinvoice');
        Route::get('/receipts/{id}/repaircompleted', [ReceiptController::class, 'repairCompleted'])->name('admin.receipts.repaircompleted');
        Route::get('/receipts/{id}/repairstart', [ReceiptController::class, 'repairStart'])->name('admin.receipts.repairstart');
        Route::get('/receipts/{id}/step', [ReceiptController::class, 'step'])->name('admin.receipts.step');
        Route::get('/receipts/{id}/delete', [ReceiptController::class, 'destroy'])->name('admin.receipts.delete');
        Route::post('/receipts/{id}/update', [ReceiptController::class, 'update'])->name('admin.receipts.update');
        Route::get('/receipts/{id}/edit', [ReceiptController::class, 'edit'])->name('admin.receipts.edit');
        Route::get('/receipts/{id}/show', [ReceiptController::class, 'show'])->name('admin.receipts.show');
        Route::post('/receipts/create', [ReceiptController::class, 'store'])->name('admin.receipts.store');
        Route::get('/receipts/create', [ReceiptController::class, 'create'])->name('admin.receipts.create');
        Route::get('/receipts', [ReceiptController::class, 'index'])->name('admin.receipts');

        //Components
        Route::get('/components/{id}/delete', [ComponentController::class, 'destroy'])->name('admin.components.delete');
        Route::post('/components/{id}/update', [ComponentController::class, 'update'])->name('admin.components.update');
        Route::get('/components/{id}/edit', [ComponentController::class, 'edit'])->name('admin.components.edit');
        Route::post('/components/create', [ComponentController::class, 'store'])->name('admin.components.store');
        Route::get('/components/create', [ComponentController::class, 'create'])->name('admin.components.create');
        Route::get('/components', [ComponentController::class, 'index'])->name('admin.components');

        //Services
        Route::get('/services/{id}/delete', [ServiceController::class, 'destroy'])->name('admin.services.delete');
        Route::post('/services/{id}/update', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::post('/services/create', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');

        //Categories
        Route::get('/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
        Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');

        //Employees
        Route::get('/employees/{id}/delete', [EmployeeController::class, 'delete'])->name('admin.employees.delete');
        Route::post('/employees/{id}/update', [EmployeeController::class, 'update'])->name('admin.employees.update');
        Route::post('/employees/change-avatar', [EmployeeController::class, 'changeAvatar'])->name('admin.employees.change-avatar');
        Route::post('/employees/create', [EmployeeController::class, 'store'])->name('admin.employees.store');
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
