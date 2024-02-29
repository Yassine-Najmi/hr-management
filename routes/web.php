<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Support\Facades\Route;
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

// Login
Route::get("/", [AuthController::class, "index"])->name("login");
Route::post("/", [AuthController::class, "login_action"])->name("login_action");

// Register
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "register_action"])->name("register_action");

// forgot-password
Route::get("/forgot-password", [AuthController::class, "forgotPassword"])->name("forgot-password");

// logout
Route::get("/logout", [AuthController::class, "logout"])->name("logout");


// Admin || HR
Route::group(["middleware" => "admin"], function () {

    // Dashboard
    Route::get("admin/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");

    // Employees
    Route::get("admin/employees", [EmployeesController::class, "employeesList"])->name("employees");
    Route::get("admin/employees/add", [EmployeesController::class, "add"])->name("employees.add");
    Route::post("admin/employees/add", [EmployeesController::class, "add_action"])->name("employees.add_action");
    Route::get("admin/employees/view/{user}", [EmployeesController::class, "view"])->name("employees.view");
});



Route::get('/test', function () {
    return view('backend.layouts.test');
});
