<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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
    return view('auth.login');
});
// Route::get('/report', function () {
//     return view('report');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware([user::class,'auth'])->group(function(){
    Route::resource('users', UserController::class);
    Route::resource('tickets', TicketController::class);
    Route::post('ticket/mobileData',[TicketController::class,'mobileData']);
    Route::get('/ticketstatus',[TicketController::class,'status']);
    Route::post('/generateReport',[TicketController::class,'generateReport']);
    Route::get('/report',[TicketController::class,'report']);
});