<?php

use App\Http\Controllers\RuleController;
use App\Http\Controllers\SanitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    redirect()->route('sanit.showRun');
});

Route::prefix('sanit')->name('sanit.')->group(function () {
    Route::get('/run', [SanitController::class, 'showRun'])->name('showRun');
    Route::post('/run', [SanitController::class, 'run'])->name('run');

    Route::post('/delete', [SanitController::class, 'delete'])->name('delete');
});

Route::prefix('rules')->name('rules.')->group(function () {
    Route::get('/', [RuleController::class, 'index'])->name('index');
    Route::get('/create', [RuleController::class, 'create'])->name('create');
    Route::post('/', [RuleController::class, 'store'])->name('store');

    Route::get('/{name}/edit', [RuleController::class, 'edit'])->name('edit');
    Route::put('/{name}', [RuleController::class, 'update'])->name('update');
    Route::delete('/{name}', [RuleController::class, 'destroy'])->name('destroy');
});
