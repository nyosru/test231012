<?php


use App\Http\Controllers\EventController;
use App\Http\Controllers\Service\EventCreateService;
use Illuminate\Support\Facades\Route;

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

Route::resource('event', EventController::class )
    ->only(['store']);

//Route::post('/event', EventCreateService::class );
//Route::post('/event', [ EventController::class , 'store' ] )
////    ->middleware(null )
////    ->only(['store'])
//;

Route::get('/', function () {
    return view('welcome');
});
