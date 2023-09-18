<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ChartOfAccountController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TripController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('vehicles', VehicleController::class);
Route::resource('drivers', DriverController::class);
Route::resource('chart_of_accounts', ChartOfAccountController::class);
Route::resource('income', IncomeController::class);
Route::resource('accounts', AccountController::class);
Route::resource('contacts','ContactController');
Route::resource('payment_methods', PaymentMethodController::class);
Route::resource('expense',ExpenseController::class);
Route::resource('trips',TripController::class);

//Transfer Controller
Route::get('transfer/create', 'App\Http\Controllers\TransferController@create')->name('transfer.create');
Route::post('transfer/store', 'App\Http\Controllers\TransferController@store')->name('transfer.store');
