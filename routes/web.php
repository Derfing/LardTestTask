<?php

use App\Http\Controllers\ContractorController;
use Illuminate\Support\Facades\Route;

Route::resource('contractors', ContractorController::class);
