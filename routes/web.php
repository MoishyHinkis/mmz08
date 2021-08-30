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
Route::get('/pricelist', [SizeController::class, 'index']);
Route::post('pricelist', [SizeController::class, 'store'])->middleware('admin');
Route::get('/pricelist/{priselist}', [SizeController::class, 'show']);
Route::get('/pricelist/{pricelist}/edit', [SizeController::class, 'edit'])->middleware('admin');
Route::put('/pricelist/{pricelist}', [SizeController::class, 'update'])->middleware('admin');
Route::delete('/pricelist/{pricelist}', [SizeController::class, 'destroy'])->middleware('admin');
Route::get('/pastbulletins', [BulletinController::class, 'index']);
Route::post('/pastbulletins', [BulletinController::class, 'store'])->middleware('admin');
Route::get('/pastbulletins/{pastbulletins}/edit', [BulletinController::class, 'edit'])->middleware('admin');
Route::put('/pastbulletins/{pastbulletins}', [BulletinController::class, 'update'])->middleware('admin');
Route::delete('/pastbulletins/{pastbulletins}', [BulletinController::class, 'destroy'])->middleware('admin');
Route::get('/contactus', [ContactUsController::class, 'index'])->middleware('admin');
Route::get('/contactus/create', [ContactUsController::class, 'create']);
Route::post('/contactus', [ContactUsController::class, 'store'])->middleware('admin');
Route::delete('/contactus/{contactus}', [ContactUsController::class, 'destroy']);
Route::get('/order', [OrderController::class, 'index'])->middleware('admin');
Route::post('/order', [OrderController::class, 'store']);
Route::delete('/order/{id}', [OrderController::class, 'destroy'])->middleware('admin');

 Route::get('/users', [RegisteredUserController::class, 'index']);
require __DIR__ . '/auth.php';
