<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\WeatherController1;
use App\Http\Controllers\DataMeteoController;
use App\Http\Controllers\Api\WeatherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['register' => false]);




Route::group(['middleware' => ['auth']], function() 
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('Users', UsersController::class)->except(['show']);

    Route::get('temperature', [DataMeteoController::class, 'historique_temperature'])->name('historique_temperature');
    Route::get('chart_temp', [DataMeteoController::class, 'chart_temp'])->name('chart_temp');
    Route::get('humidite', [DataMeteoController::class, 'historique_humidite'])->name('historique_humidite');
    Route::get('chart_humidite', [DataMeteoController::class, 'chart_humidite'])->name('chart_humidite');
    Route::get('vitesse', [DataMeteoController::class, 'historique_vitesse'])->name('historique_vitesse');
    Route::get('chart_vitesse', [DataMeteoController::class, 'chart_vitesse'])->name('chart_vitesse');
    Route::get('pluie', [DataMeteoController::class, 'historique_pluie'])->name('historique_pluie');
    Route::get('chart_pluie', [DataMeteoController::class, 'chart_pluie'])->name('chart_pluie');
    Route::get('direction', [DataMeteoController::class, 'historique_direction'])->name('historique_direction');
    Route::get('chart_direction', [DataMeteoController::class, 'chart_direction'])->name('chart_direction');
    
    // Route::get('previsions_show', [WeatherController::class, 'index'])->name('Previsions');
    Route::get('previsions', [WeatherController1::class,'Previsions'])->name('previsions');

    // export
    Route::get('export', [ExportController::class, 'to_view_export'])->name('to_view_export');
    Route::POST('export_day', [ExportController::class, 'export_day'])->name('export_day');
    // Route::POST('export_week', [ExportController::class, 'export_week'])->name('export_week');
    Route::POST('export_month', [ExportController::class, 'export_month'])->name('export_month');
    Route::POST('export_year', [ExportController::class, 'export_year'])->name('export_year');
    //End export
    
    // test
    // Route::get('test', [DataMeteoController::class, 'test'])->name('test');
    // Route::get('getAllDays', [DataMeteoController::class, 'getAllDays'])->name('getAllDays');
    // Route::get('last_val_temp', [HomeController::class, 'last_val_temp'])->name('last_val_temp');
    // Route::get('Nfroid', [DataMeteoController::class, 'Nfroid'])->name('Nfroid');


    // Route::get('getUserData', [UsersController::class, 'getUserData'])->name('getUserData');



});

// ->middleware('auth')