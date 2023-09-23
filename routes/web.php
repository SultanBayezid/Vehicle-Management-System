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



Auth::routes();
Route::middleware(['auth'])->group(function () {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    
    //Transfer Controller
    Route::get('transfer/create', 'App\Http\Controllers\TransferController@create')->name('transfer.create');
    Route::post('transfer/store', 'App\Http\Controllers\TransferController@store')->name('transfer.store');
    
    Route::match(['get', 'post'],'trip_expense/store_payment/{id?}','App\Http\Controllers\TripController@store_payment')->name('trip_expense.create_payment');
    Route::match(['get', 'post'],'trip_income/store_payment/{invoice_id?}','App\Http\Controllers\TripController@store_payment_income')->name('trip_income.create_payment');
    
    Route::resource('trips',TripController::class);



    //Report Controller
			Route::match(['get', 'post'],'reports/account_statement/{view?}', 'App\Http\Controllers\ReportController@account_statement')->name('reports.account_statement');
			Route::match(['get', 'post'],'reports/income_report/{view?}', 'App\Http\Controllers\ReportController@income_report')->name('reports.income_report');
			Route::match(['get', 'post'],'reports/expense_report/{view?}', 'App\Http\Controllers\ReportController@expense_report')->name('reports.expense_report');
			Route::match(['get', 'post'],'reports/transfer_report/{view?}', 'App\Http\Controllers\ReportController@transfer_report')->name('reports.transfer_report');
			Route::match(['get', 'post'],'reports/income_vs_expense/{view?}', 'App\Http\Controllers\ReportController@income_vs_expense')->name('reports.income_vs_expense');
			Route::match(['get', 'post'],'reports/report_by_payer/{view?}', 'App\Http\Controllers\ReportController@report_by_payer')->name('reports.report_by_payer');
			Route::match(['get', 'post'],'reports/report_by_payee/{view?}', 'App\Http\Controllers\ReportController@report_by_payee')->name('reports.report_by_payee');
    
});
