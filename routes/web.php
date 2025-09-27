<?php

use Illuminate\Support\Facades\Route;

Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index']);
