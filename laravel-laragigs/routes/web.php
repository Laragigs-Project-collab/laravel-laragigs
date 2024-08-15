<?php

use App\Http\Controllers\ListingController;
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


//store listing
Route::post('/listings', [ListingController::class, 'store']);