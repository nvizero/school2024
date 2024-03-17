<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FilesController;

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

Route::get('export', [CustomAuthController::class, 'export']);

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('signOut', [CustomAuthController::class, 'signOut'])->name('auth.signOut');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::resource('products', ProductController::class);


Route::get('/', function () {
     return view('welcome');
});


Route::get('/files', [FilesController::class , 'index'])->name('files.index');
Route::get('/files/add', [FilesController::class , 'create'])->name('files.create');
Route::post('/files/add', [FilesController::class , 'store'])->name('files.store');
Route::post('/files/import', [FilesController::class , 'import'])->name('files.import');

