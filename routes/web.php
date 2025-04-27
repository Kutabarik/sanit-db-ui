<?php

use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

Route::get('/rules', [RuleController::class, 'index'])->name('rules.index');
Route::get('/rules/create', [RuleController::class, 'create'])->name('rules.create');
Route::post('/rules', [RuleController::class, 'store'])->name('rules.store');
Route::get('/rules/{table}/{index}/edit', [RuleController::class, 'edit'])->name('rules.edit');
Route::put('/rules/{table}/{index}', [RuleController::class, 'update'])->name('rules.update');
Route::delete('/rules/{table}/{index}', [RuleController::class, 'destroy'])->name('rules.destroy');
