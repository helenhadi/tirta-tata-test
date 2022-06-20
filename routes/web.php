<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TabelAController;
use App\Http\Controllers\TabelBController;
use App\Http\Controllers\TabelCController;
use App\Http\Controllers\TabelDController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::post('/modal', [HomeController::class, 'modal'])->name('modal');
Route::prefix('a')->name('a.')->group(function () {
    Route::get('/', [TabelAController::class, 'index'])->name('index');
    Route::post('/save', [TabelAController::class, 'save'])->name('save');
    Route::post('/delete', [TabelAController::class, 'destroy'])->name('delete');
    Route::post('/import',[TabelAController::class,'import'])->name('import');
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/excel',[TabelAController::class,'exportExcel'])->name('excel');
        Route::get('/pdf',[TabelAController::class,'exportPdf'])->name('pdf');
    });
});
Route::prefix('b')->name('b.')->group(function () {
    Route::get('/', [TabelBController::class, 'index'])->name('index');
    Route::post('/save', [TabelBController::class, 'save'])->name('save');
    Route::post('/delete', [TabelBController::class, 'destroy'])->name('delete');
    Route::post('/import',[TabelBController::class,'import'])->name('import');
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/excel',[TabelBController::class,'exportExcel'])->name('excel');
        Route::get('/pdf',[TabelBController::class,'exportPdf'])->name('pdf');
    });
});
Route::prefix('c')->name('c.')->group(function () {
    Route::get('/', [TabelCController::class, 'index'])->name('index');
    Route::post('/save', [TabelCController::class, 'save'])->name('save');
    Route::post('/delete', [TabelCController::class, 'destroy'])->name('delete');
    Route::post('/import',[TabelCController::class,'import'])->name('import');
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/excel',[TabelCController::class,'exportExcel'])->name('excel');
        Route::get('/pdf',[TabelCController::class,'exportPdf'])->name('pdf');
    });
});
Route::prefix('d')->name('d.')->group(function () {
    Route::get('/', [TabelDController::class, 'index'])->name('index');
    Route::post('/save', [TabelDController::class, 'save'])->name('save');
    Route::post('/delete', [TabelDController::class, 'destroy'])->name('delete');
    Route::post('/import',[TabelCController::class,'import'])->name('import');
    Route::prefix('export')->name('export.')->group(function () {
        Route::get('/excel',[TabelCController::class,'exportExcel'])->name('excel');
        Route::get('/pdf',[TabelCController::class,'exportPdf'])->name('pdf');
    });
});
