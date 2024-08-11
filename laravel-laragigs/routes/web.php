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
Route::get('/listing/{id}', function($id){
    return view('listing', [
        'heading' => 'Single Listing',
        'listings' => Listing::find($id)
    ]);
});