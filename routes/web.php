<?php

use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'rules'], function () {
    Route::get('/', [RuleController::class, 'index'])->name('rules.index');
    Route::get('/create', [RuleController::class, 'create'])->name('rules.create');
    Route::post('/', [RuleController::class, 'store'])->name('rules.store');
    Route::get('/{table}/{index}/edit', [RuleController::class, 'edit'])->name('rules.edit');
    Route::put('/{table}/{index}', [RuleController::class, 'update'])->name('rules.update');
    Route::delete('/{table}/{index}', [RuleController::class, 'destroy'])->name('rules.destroy');

    Route::get('/run', [RuleController::class, 'showRun'])->name('rules.run.show');
    Route::post('/run', [RuleController::class, 'run'])->name('rules.run');
});
