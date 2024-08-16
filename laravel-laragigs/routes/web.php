<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\Usercontroller;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


//All listings
Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
//show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Edit listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
// Edit Submit to Update
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Destroy
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Show register
Route::get('/register', [Usercontroller::class, 'register'])->middleware('guest');

//cerate new user
Route::post('/users', [Usercontroller::class, 'store']);
// Log user out
Route::post('/logout', [Usercontroller::class, 'logout'])->middleware('auth');
Route::get('/login', [Usercontroller::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [Usercontroller::class, 'authenticate']);