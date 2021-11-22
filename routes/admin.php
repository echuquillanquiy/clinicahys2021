<?php

use App\Http\Controllers\Admin\Admin\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('', [HomeController::class, 'index'])->name('admininistrador');
