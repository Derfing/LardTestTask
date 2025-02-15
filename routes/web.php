<?php

use App\Http\Controllers\ContractorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ContractorController::class, 'index']);

Route::resource('contractors', ContractorController::class);
