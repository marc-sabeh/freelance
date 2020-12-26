<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ImportController;
use App\Models\import;

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

Route::get('/', function () {
    (new import())->importToDb();
    dd('done');
    return view('welcome'); 
});

Route::resource('reports', ReportsController::class)->shallow();
Route::resource('import', ImportController::class)->shallow();
