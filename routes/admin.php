<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RepairReceiptController;
use App\Http\Controllers\Admin\ReceiveReceiptController;
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

        //Order
        Route::get('/orders/{id}/status', [OrderController::class, 'status'])->name('admin.orders.status');
        Route::get('/orders/{id}/delete', [OrderController::class, 'destroy'])->name('admin.orders.delete');
        Route::post('/orders/{id}/update', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::get('/orders/{id}/show', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/orders/create', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
        Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');

        //Appointments
        Route::get('/appointments/{id}/delete', [AppointmentController::class, 'destroy'])->name('admin.appointments.delete');
        Route::post('/appointments/{id}/update', [AppointmentController::class, 'update'])->name('admin.appointments.update');
        Route::get('/appointments/{id}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
        Route::post('/appointments/create', [AppointmentController::class, 'store'])->name('admin.appointments.store');
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('admin.appointments');

        //Repair Receipts
        Route::post('/repair-receipts/{id}/components', [RepairReceiptController::class, 'components'])->name('admin.repair-receipts.components.add');
        Route::post('/repair-receipts/{id}/services', [RepairReceiptController::class, 'services'])->name('admin.repair-receipts.services.add');
        Route::get('/repair-receipts/{id}/status', [RepairReceiptController::class, 'repaired'])->name('admin.repair-receipts.status.repaired');
        Route::get('/repair-receipts/{id}/delete', [RepairReceiptController::class, 'destroy'])->name('admin.repair-receipts.delete');
        Route::post('/repair-receipts/{id}/update', [RepairReceiptController::class, 'update'])->name('admin.repair-receipts.update');
        Route::get('/repair-receipts/{id}/edit', [RepairReceiptController::class, 'edit'])->name('admin.repair-receipts.edit');
        Route::get('/repair-receipts/{id}/show', [RepairReceiptController::class, 'show'])->name('admin.repair-receipts.show');
        Route::post('/repair-receipts/create', [RepairReceiptController::class, 'store'])->name('admin.repair-receipts.store');
        Route::get('/repair-receipts/create', [RepairReceiptController::class, 'create'])->name('admin.repair-receipts.create');
        Route::get('/repair-receipts', [RepairReceiptController::class, 'index'])->name('admin.repair-receipts');

        //Receive Receipts
        Route::get('/receive-receipts/{id}/issueinvoice', [ReceiveReceiptController::class, 'issueInvoice'])->name('admin.receive-receipts.issueinvoice');
        Route::get('/receive-receipts/{id}/repaircompleted', [ReceiveReceiptController::class, 'repairCompleted'])->name('admin.receive-receipts.repaircompleted');
        Route::get('/receive-receipts/{id}/repairstart', [ReceiveReceiptController::class, 'repairStart'])->name('admin.receive-receipts.repairstart');
        Route::get('/receive-receipts/{id}/step', [ReceiveReceiptController::class, 'step'])->name('admin.receive-receipts.step');
        Route::get('/receive-receipts/{id}/delete', [ReceiveReceiptController::class, 'destroy'])->name('admin.receive-receipts.delete');
        Route::post('/receive-receipts/{id}/update', [ReceiveReceiptController::class, 'update'])->name('admin.receive-receipts.update');
        Route::get('/receive-receipts/{id}/edit', [ReceiveReceiptController::class, 'edit'])->name('admin.receive-receipts.edit');
        Route::get('/receive-receipts/{id}/show', [ReceiveReceiptController::class, 'show'])->name('admin.receive-receipts.show');
        Route::post('/receive-receipts/create', [ReceiveReceiptController::class, 'store'])->name('admin.receive-receipts.store');
        Route::get('/receive-receipts/create', [ReceiveReceiptController::class, 'create'])->name('admin.receive-receipts.create');
        Route::get('/receive-receipts', [ReceiveReceiptController::class, 'index'])->name('admin.receive-receipts');

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
