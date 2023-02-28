<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\exp_particularlController;
use App\Http\Controllers\exp_bill_detailController;
use App\Http\Controllers\LadgerController;


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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/particularl', [exp_particularlController::class, 'index'])->name('particularl.index');
    Route::post('/particularl-store', [exp_particularlController::class, 'store'])->name('particularl.store');
    Route::get('/particularl-delete/{id}', [exp_particularlController::class, 'delete'])->name('particularl.delete');
    Route::get('/particularl-edit/{id}', [exp_particularlController::class, 'edit'])->name('particularl.edit');
    Route::post('/particularl-update/{id}', [exp_particularlController::class, 'update'])->name('particularl.update');




    Route::get('/bill', [exp_bill_detailController::class, 'index'])->name('bill.index');
    Route::post('/bill-store', [exp_bill_detailController::class, 'store'])->name('bill.store');
    Route::get('/bill-delete/{id}', [exp_bill_detailController::class, 'delete'])->name('bill.delete');
    Route::get('/bill-edit/{id}', [exp_bill_detailController::class, 'edit'])->name('bill.edit');
    Route::post('/bill-update/{id}', [exp_bill_detailController::class, 'update'])->name('bill.update');



    Route::post('/search', [LadgerController::class, 'index'])->name('search.index');

    // Route::post('/search-date', [LadgerController::class, 'index_date'])->name('search_date.index');






});

require __DIR__.'/auth.php';
