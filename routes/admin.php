<?php

use App\Http\Controllers\Admin\Admin\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Asignar;


Route::get('', [HomeController::class, 'index'])->name('admininistrador');

Route::get('users', [UserController::class, 'index'])->name('usuarios');
Route::get('roles', [RoleController::class, 'index'])->name('roles');

Route::get('permissions', [PermissionController::class, 'index'])->name('permisos');

Route::get('asignar', [Asignar::class, 'index'])->name('asignar.permisos');
