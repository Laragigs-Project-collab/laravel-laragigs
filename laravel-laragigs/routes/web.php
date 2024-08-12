<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;


//All listings
Route::get('/', [ListingController::class, 'index']);


// single listing
Route::get('/listing/{listing}', [ListingController::class, 'show']);