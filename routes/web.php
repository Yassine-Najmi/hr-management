<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\JobsController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Backend\Dashboard as BackendDashboard;
use App\Livewire\Backend\Employees\EmployeeCreate;
use App\Livewire\Backend\Employees\EmployeeEdit;
use App\Livewire\Backend\Employees\Employees;
use App\Livewire\Backend\Employees\EmployeesList;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Login::class, 'index']);
Route::get('forgot-password', [AuthController::class, 'forgot_password']);
Route::get('register', [Register::class, 'register']);
Route::post('register', [Register::class, 'register_post']);
Route::post('checkemail', [AuthController::class, 'CheckEmail']);

Route::post('/', [Login::class, 'login_post']);

// Admin || HR 

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [BackendDashboard::class, 'dashboard']);

    // Employees
    Route::get('admin/employees', [EmployeesList::class, 'index']);
    Route::get('admin/employees/add', [EmployeeCreate::class, 'add']);
    Route::post('admin/employees/add', [EmployeeCreate::class, 'add_post']);
    Route::get('admin/employees/view/{id}', [EmployeesList::class, 'view']);
    Route::get('admin/employees/edit/{id}', [EmployeeEdit::class, 'edit']);
    Route::post('admin/employees/edit/{id}', [EmployeeEdit::class, 'edit_post']);
    Route::get('admin/employees/delete/{id}', [Employees::class, 'delete']);

    //Jobs
    Route::get('admin/jobs', [JobsController::class, 'index']);
    Route::get('admin/jobs/add', [JobsController::class, 'add']);
    Route::post('admin/jobs/add', [JobsController::class, 'add_post']);
    Route::get('admin/jobs/view/{id}', [JobsController::class, 'view']);
    Route::get('admin/jobs/edit/{id}', [JobsController::class, 'edit']);
    Route::post('admin/jobs/edit/{id}', [JobsController::class, 'edit_post']);
    Route::get('admin/jobs/delete/{id}', [JobsController::class, 'delete']);
    Route::get('admin/jobs/export', [JobsController::class, 'export']);
});

Route::get('logout', [AuthController::class, 'logout']);
