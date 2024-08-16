<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\Usercontroller;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


//All listings
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create', [ListingController::class, 'create']);

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//store listing
Route::post('/listings', [ListingController::class, 'store']);

//Destroy
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Show register
Route::get('/register', [Usercontroller::class, 'register']);

//cerate new user
Route::post('/users', [Usercontroller::class, 'store']);