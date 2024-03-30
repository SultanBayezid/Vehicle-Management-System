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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ClientController;



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



    Route::get('/', 'App\Http\Controllers\FrontendController@index');
    Route::get('/fleet-management', function () {
        return view('frontend.features.fleet-management');
    });
    Route::get('/trip-management', function () {
        return view('frontend.features.trip-management');
    });
    Route::get('/financial-management', function () {
        return view('frontend.features.financial-management');
    });
    Route::get('/contact-management', function () {
        return view('frontend.features.contact-management');
    });

    Route::get('/rent', 'App\Http\Controllers\FrontendController@rent')->name('rent');

    Route::get('/book/{vehicle_id}/{user_id}', 'App\Http\Controllers\FrontendController@bookingStep1')->name('book');
    Route::post('/book/step2', 'App\Http\Controllers\FrontendController@bookingStep2')->name('book.step2');
    Route::get('/book/step3', 'App\Http\Controllers\FrontendController@bookingStep3')->name('book.step3');

    Route::group(['prefix' => 'clients', 'middleware' => ['client']], function(){
        route::get('trip/list', [ClientController::class, 'triplist'])->name('trip.list');
        route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');

    
    
    });

    Route::post('upload/images', 'App\Http\Controllers\ClientController@upload')->name('upload.images');

// Clinet Register 

Route::post('/client_signup', 'App\Http\Controllers\Auth\RegisterController@client_signup')->name('client_signup');


Route::get('/vehicle/show/{id}', [FrontendController::class, 'singleCar'])->name('single.vehicle');
Auth::routes();

    Route::group(['middleware' => ['company']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
    Route::get('vehicle/services/list/{id}', 'App\Http\Controllers\VehicleController@VehicleService')->name('vehicle_services');
    Route::get('vehicle/issues/list/{id}', 'App\Http\Controllers\VehicleController@VehicleIssue')->name('vehicle_issues');
    Route::get('vehicle/fuel/list/{id}', 'App\Http\Controllers\VehicleController@VehicleFuels')->name('vehicle_fuels');
    Route::get('vehicle/trip/list/{id}', 'App\Http\Controllers\VehicleController@VehicleTrip')->name('vehicle_trips');
    Route::resource('vehicles', VehicleController::class);
    Route::resource('drivers', DriverController::class);
    Route::resource('chart_of_accounts', ChartOfAccountController::class);
    Route::resource('income', IncomeController::class);
    Route::resource('accounts', AccountController::class);
    	//Contact Controller
			Route::get('contacts/get_table_data','App\Http\Controllers\ContactController@get_table_data');
			Route::post('contacts/send_email/{id}','App\Http\Controllers\ContactController@send_email')->name('contacts.send_email');
			Route::resource('contacts','App\Http\Controllers\ContactController');
			Route::resource('issues','App\Http\Controllers\IssueController');
            Route::get('/fetch-issues-by-vehicle/{vehicleId}', 'ServiceController@fetchIssuesByVehicle');
			Route::resource('services','App\Http\Controllers\ServiceController');
            
			Route::resource('fuels','App\Http\Controllers\FuelController');

            
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('expense',ExpenseController::class);
    
    //Transfer Controller
    Route::get('transfer/create', 'App\Http\Controllers\TransferController@create')->name('transfer.create');
    Route::post('transfer/store', 'App\Http\Controllers\TransferController@store')->name('transfer.store');
    
    Route::match(['get', 'post'],'trip_expense/store_payment/{id?}','App\Http\Controllers\TripController@store_payment')->name('trip_expense.create_payment');
    Route::match(['get', 'post'],'trip_income/store_payment/{invoice_id?}','App\Http\Controllers\TripController@store_payment_income')->name('trip_income.create_payment');
    
    Route::resource('trips',TripController::class);


    //Company Settings Controller
			Route::post('company/upload_logo', 'App\Http\Controllers\CompanySettingController@upload_logo')->name('company.change_logo');
			Route::resource('settings','App\Http\Controllers\CompanySettingController');


    //Report Controller
			Route::match(['get', 'post'],'reports/account_statement/{view?}', 'App\Http\Controllers\ReportController@account_statement')->name('reports.account_statement');
			Route::match(['get', 'post'],'reports/income_report/{view?}', 'App\Http\Controllers\ReportController@income_report')->name('reports.income_report');
			Route::match(['get', 'post'],'reports/expense_report/{view?}', 'App\Http\Controllers\ReportController@expense_report')->name('reports.expense_report');
			Route::match(['get', 'post'],'reports/transfer_report/{view?}', 'App\Http\Controllers\ReportController@transfer_report')->name('reports.transfer_report');
			Route::match(['get', 'post'],'reports/income_vs_expense/{view?}', 'App\Http\Controllers\ReportController@income_vs_expense')->name('reports.income_vs_expense');
			Route::match(['get', 'post'],'reports/report_by_payer/{view?}', 'App\Http\Controllers\ReportController@report_by_payer')->name('reports.report_by_payer');
			Route::match(['get', 'post'],'reports/report_by_payee/{view?}', 'App\Http\Controllers\ReportController@report_by_payee')->name('reports.report_by_payee');
    
});
