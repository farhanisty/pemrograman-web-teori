<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });
