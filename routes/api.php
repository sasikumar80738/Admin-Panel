<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;
use App\Http\Controllers\AuthController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;



    Route::get('/crud', [CrudController::class, 'index'])->name('index');

 
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/crud', [CrudController::class, 'store'])->name('store');
        Route::get('/crud/{id}', [CrudController::class, 'edit'])->name('edit');
        Route::post('/crud/update/{id}', [CrudController::class, 'update'])->name('update');
        Route::get('/crud/delete/{id}', [CrudController::class, 'delete'])->name('delete');
    });

Route::post('/crud/livesearch', [crudController::class,'livesearch'])->name('livesearch');

 Route::post('/import', [crudController::class, 'import'])->name('import');
 Route::get('/export', [crudController::class, 'export'])->name('export');


 Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);