<?php

use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::get('/rules', [RuleController::class, 'index']);
