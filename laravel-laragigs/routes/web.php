<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;


//All listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'latest Listing',
        'listings' => Listing::all()
    ]);
});


// single listing
Route::get('/listing/{listing}', function(Listing $listing){
    return view('listing', [
        'listings' => $listing
    ]);
});