<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;




  
    
    Route::get('/', function () {
        return view('welcome');
    });

   
    Route::get('/registerform', function () {
        return view('register');
    });

    Route::get('/excel', function () {
        return view('excel');
    });

        Route::get('/loginform', function () {
            return view('login');
        })->name('loginform');
   