<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\JabatanController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    $title = 'Dashboard';
    return view('dashboard', compact('title'));
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    // route jabatan
    Route::resource('akses/jabatan', JabatanController::class);
    Route::post('akses/jabatan/data_list', [JabatanController::class, 'data_list']);

    // route akun
    Route::resource('akses/akun', AkunController::class);
    Route::post('akses/akun/data_list', [AkunController::class, 'data_list']);
});
