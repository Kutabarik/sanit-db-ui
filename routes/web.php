<?php

use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

Route::prefix('rules')->name('rules.')->group(function () {
    Route::get('/', [RuleController::class, 'index'])->name('index');
    Route::get('/create', [RuleController::class, 'create'])->name('create');
    Route::post('/', [RuleController::class, 'store'])->name('store');

    Route::get('/{name}/edit', [RuleController::class, 'edit'])->name('edit');
    Route::put('/{name}', [RuleController::class, 'update'])->name('update');
    Route::delete('/{name}', [RuleController::class, 'destroy'])->name('destroy');

    Route::get('/run', [RuleController::class, 'showRun'])->name('run.show');
    Route::post('/run', [RuleController::class, 'run'])->name('run');
});
