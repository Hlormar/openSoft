<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FractionController;

Route::resource('fractions', FractionController::class);
