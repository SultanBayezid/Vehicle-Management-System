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
use App\Http\Controllers\BlogController;



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


Route::get('/fetch-models/{brand_id}', 'App\Http\Controllers\VehicleController@fetchModels')->name('fetch_models');

    Route::get('/', 'App\Http\Controllers\FrontendController@index')->name('home');
    Route::get('/fleet-management', function () {
        return view('frontend.features.fleet-management');
    })->name('fleet-management');
    
    Route::get('/trip-management', function () {
        return view('frontend.features.trip-management');
    })->name('trip-management');

    Route::get('/financial-management', function () {
        return view('frontend.features.financial-management');
    })->name('financial-management');
    
 Route::get('/contact-management', function () {
    return view('frontend.features.contact-management');
})->name('contact-management');

Route::get('/pricing', function () {
    return view('frontend.pricing');
})->name('pricing');

Route::get('/contact-us', function () {
    return view('frontend.contact-us');
})->name('contactus');

    Route::get('/rent', 'App\Http\Controllers\FrontendController@rent')->name('rent');

    Route::get('/book/{vehicle_id}/{user_id}', 'App\Http\Controllers\FrontendController@bookingStep1')->name('book');
    Route::post('/book/step2', 'App\Http\Controllers\FrontendController@bookingStep2')->name('book.step2');
    Route::get('/book/step3', 'App\Http\Controllers\FrontendController@bookingStep3')->name('book.step3');
    Route::get('/enquiry/{id}', 'App\Http\Controllers\FrontendController@enquiry')->name('enquiry');
    Route::post('/enquiry', 'App\Http\Controllers\FrontendController@enquirySend')->name('enquirySend');
    Route::get('/search', 'App\Http\Controllers\FrontendController@search')->name('search');

    Route::group(['prefix' => 'clients', 'middleware' => ['client']], function(){
        route::get('trip/list', [ClientController::class, 'triplist'])->name('trip.list');
        route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');

    
    
    });

    Route::post('upload/images', 'App\Http\Controllers\ClientController@upload')->name('upload.images');

// Clinet Register 

Route::post('/client_signup', 'App\Http\Controllers\Auth\RegisterController@client_signup')->name('client_signup');


Route::get('/vehicle/show/{id}', [FrontendController::class, 'singleCar'])->name('single.vehicle');
Auth::routes();
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

           //Profile Controller
           Route::get('profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
           Route::get('profile/edit', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
           Route::post('profile/update', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
           Route::get('profile/change_password', 'App\Http\Controllers\ProfileController@change_password')->name('profile.change_password');
           Route::post('profile/update_password', 'App\Http\Controllers\ProfileController@update_password')->name('profile.update_password');

});

    Route::group(['middleware' => ['company']], function () {
			Route::resource('staffs','App\Http\Controllers\StaffController');


    Route::get('vehicle/services/list/{id}', 'App\Http\Controllers\VehicleController@VehicleService')->name('vehicle_services');
    Route::get('vehicle/issues/list/{id}', 'App\Http\Controllers\VehicleController@VehicleIssue')->name('vehicle_issues');
    Route::get('vehicle/fuel/list/{id}', 'App\Http\Controllers\VehicleController@VehicleFuels')->name('vehicle_fuels');
    Route::get('vehicle/trip/list/{id}', 'App\Http\Controllers\VehicleController@VehicleTrip')->name('vehicle_trips');
    Route::get('vehicle/image/delete/{id}', 'App\Http\Controllers\VehicleController@imageDelete')->name('vehicle_image_delete');
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
            Route::get('/get-vehicle-issues/{id}', 'App\Http\Controllers\ServiceController@getVehicleIssues')->name('get.vehicle.issues');

			Route::resource('services','App\Http\Controllers\ServiceController');
            
			Route::resource('fuels','App\Http\Controllers\FuelController');
			Route::resource('contact_groups','App\Http\Controllers\ContactGroupController');

            
            
    Route::resource('payment_methods', PaymentMethodController::class);
    Route::resource('expense',ExpenseController::class);
    
    //Transfer Controller
    Route::get('transfer/create', 'App\Http\Controllers\TransferController@create')->name('transfer.create');
    Route::post('transfer/store', 'App\Http\Controllers\TransferController@store')->name('transfer.store');
    
    Route::match(['get', 'post'],'trip_expense/store_payment/{id?}','App\Http\Controllers\TripController@store_payment')->name('trip_expense.create_payment');
    Route::match(['get', 'post'],'trip_income/store_payment/{invoice_id?}','App\Http\Controllers\TripController@store_payment_income')->name('trip_income.create_payment');
    
    Route::resource('trips',TripController::class);



	//Company Settings Controller
    Route::post('company/upload_logo', 'App\Http\Controllers\CompanySettingsController@upload_logo')->name('company.change_logo');
    Route::match(['get', 'post'],'company/general_settings/{store?}', 'App\Http\Controllers\CompanySettingsController@settings')->name('company.change_settings');

    //Report Controller
			Route::match(['get', 'post'],'reports/account_statement/{view?}', 'App\Http\Controllers\ReportController@account_statement')->name('reports.account_statement');
			Route::match(['get', 'post'],'reports/income_report/{view?}', 'App\Http\Controllers\ReportController@income_report')->name('reports.income_report');
			Route::match(['get', 'post'],'reports/expense_report/{view?}', 'App\Http\Controllers\ReportController@expense_report')->name('reports.expense_report');
			Route::match(['get', 'post'],'reports/transfer_report/{view?}', 'App\Http\Controllers\ReportController@transfer_report')->name('reports.transfer_report');
			Route::match(['get', 'post'],'reports/income_vs_expense/{view?}', 'App\Http\Controllers\ReportController@income_vs_expense')->name('reports.income_vs_expense');
			Route::match(['get', 'post'],'reports/report_by_payer/{view?}', 'App\Http\Controllers\ReportController@report_by_payer')->name('reports.report_by_payer');
			Route::match(['get', 'post'],'reports/report_by_payee/{view?}', 'App\Http\Controllers\ReportController@report_by_payee')->name('reports.report_by_payee');
    
});


Route::resource('blogs', BlogController::class);


Route::group(['middleware' => ['admin']], function () {
    //User Controller
    Route::get('users/type/{user_type}','App\Http\Controllers\UserController@index');
    Route::resource('users','App\Http\Controllers\UserController');
    
    
});


// routes/web.php

Route::get('/driver/login', 'App\Http\Controllers\DriverAuthController@showLoginForm')->name('driver.login');
Route::post('/driver/login', 'App\Http\Controllers\DriverAuthController@login')->name('driver.login.submit');

Route::middleware('driver')->group(function () {
    Route::get('driver/vehicles/{id?}', 'App\Http\Controllers\DriverController@dVehicle')->name('driver_vehicles');
    Route::get('driver/issue/{id?}', 'App\Http\Controllers\DriverController@dIssue')->name('driver_issue');
    Route::post('driver/issue/store', 'App\Http\Controllers\DriverController@dIssueStore')->name('driver_issue_store');
    Route::PATCH('driver/issue/update/{id}', 'App\Http\Controllers\DriverController@dIssueUpdate')->name('driver_issue_update');
    Route::delete('driver/issues/delete/{id}', 'App\Http\Controllers\DriverController@dIssueDelete')->name('driver_issue_delete');

    Route::get('driver/fuel_history/{id?}', 'App\Http\Controllers\DriverController@dFuelHistory')->name('driver_fuelhistory');
    Route::post('driver/fuel_history/store', 'App\Http\Controllers\DriverController@dFuelHoistoryStore')->name('driver_fuelhistory_store');
    Route::PATCH('driver/fuel_history/update/{id}', 'App\Http\Controllers\DriverController@dFuelUpdate')->name('driver_fuel_update');
    Route::delete('driver/fuel_history/delete/{id}', 'App\Http\Controllers\DriverController@dFuelDelete')->name('driver_fuel_delete');
    Route::get('driver/customer/{id?}', 'App\Http\Controllers\DriverController@dCustomer')->name('driver_customers');
    Route::post('driver/customer/store', 'App\Http\Controllers\DriverController@dCustomerStore')->name('driver_customer_store');
    Route::PATCH('driver/customer/update/{id}', 'App\Http\Controllers\DriverController@dCutomerUpdate')->name('driver_customer_update');
    Route::delete('driver/customer/delete/{id}', 'App\Http\Controllers\DriverController@dCutomerDelete')->name('driver_customer_delete');


    Route::get('driver/trips/{id?}', 'App\Http\Controllers\DriverController@dTrip')->name('driver_trips');
    Route::post('driver/trips/store', 'App\Http\Controllers\DriverController@dTripStore')->name('driver_trip_store');
    Route::PATCH('driver/trips/update/{id}', 'App\Http\Controllers\DriverController@dTripUpdate')->name('driver_trip_update');
    Route::delete('driver/trips/delete/{id}', 'App\Http\Controllers\DriverController@dTripDelete')->name('driver_trip_delete');







    
});

Route::resource('languages','App\Http\Controllers\LanguageController');



       //Utility Controller
       Route::match(['get', 'post'], 'administration/general_settings/{store?}', 'App\Http\Controllers\UtilityController@settings')->name('settings.update_settings');
       Route::post('administration/upload_logo', 'App\Http\Controllers\UtilityController@upload_logo')->name('settings.uplaod_logo');
       Route::get('administration/database_backup_list', 'App\Http\Controllers\UtilityController@database_backup_list')->name('database_backups.list');
       Route::get('administration/create_database_backup', 'App\Http\Controllers\UtilityController@create_database_backup')->name('database_backups.create');
       Route::delete('administration/destroy_database_backup/{id}', 'App\Http\Controllers\UtilityController@destroy_database_backup');
       Route::get('administration/download_database_backup/{id}', 'App\Http\Controllers\UtilityController@download_database_backup')->name('database_backups.download');
       Route::post('administration/remove_cache', 'App\Http\Controllers\UtilityController@remove_cache')->name('settings.remove_cache');

       //Email Template
       Route::resource('email_templates', 'EmailTemplateController')->only([
           'index', 'create', 'store', 'show', 'edit', 'update', 'destroy',
       ]);



       Route::post('/set-language', 'App\Http\Controllers\LanguageController@setLanguage')->name('setLanguage');
