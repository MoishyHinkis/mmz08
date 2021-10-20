<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Session;

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

route::inertia('/', 'Main');
Route::redirect('main', '/');
Route::get('/size', [SizeController::class, 'index']);
Route::post('size', [SizeController::class, 'store'])->middleware('admin');
Route::get('/size/{size}', [SizeController::class, 'show']);
Route::get('/size/{size}/edit', [SizeController::class, 'edit'])->middleware('admin');
Route::post('/size/{size}', [SizeController::class, 'update'])->middleware('admin');
Route::delete('/size/{size}', [SizeController::class, 'destroy'])->middleware('admin');
Route::get('/bulletin', [BulletinController::class, 'index']);
Route::post('/bulletin', [BulletinController::class, 'store'])->middleware('admin');
Route::get('/bulletin/{bulletin}/edit', [BulletinController::class, 'edit'])->middleware('admin');
Route::post('/bulletin/{bulletin}', [BulletinController::class, 'update'])->middleware('admin');
Route::delete('/bulletin/{bulletin}', [BulletinController::class, 'destroy'])->middleware('admin');
Route::get('/contactUs', [ContactUsController::class, 'index'])->middleware('admin');
Route::get('/contactUs/create', [ContactUsController::class, 'create']);
Route::post('/contactUs', [ContactUsController::class, 'store']);
Route::delete('/contactUs/{contactUs}', [ContactUsController::class, 'destroy'])->middleware('admin');
Route::get('/order', [OrderController::class, 'index'])->middleware('admin');
Route::post('/order', [OrderController::class, 'store'])->middleware('auth');
Route::delete('/order/{order}', [OrderController::class, 'destroy'])->middleware('admin');
Route::get('/user', [RegisteredUserController::class, 'index'])->middleware('admin');
Route::get('/user/{user}', [RegisteredUserController::class, 'show'])->middleware('auth');

require __DIR__ . '/auth.php';
