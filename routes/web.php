<?php


use App\Http\Controllers\EventController;
use App\Http\Controllers\PageController as PageControllerAlias;
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


//Route::get('/222', function () {
////    dd([11]);
//});

Route::get('/', [PageControllerAlias::class, 'index']);
//Route::get('/', [PageControllerAlias::class, 'index']);
//Route::get('/', function () {
////    dd([11]);
//    return view('welcome');
//});
