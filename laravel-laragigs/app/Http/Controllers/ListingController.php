<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class ListingController extends Controller
{
    //
    public function index(){
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }
    
    public function show(Listing $listing){
        return view('listings.show', [
            'listings' => $listing
        ]);
    }
    
    public function edit(Listing $listing){
        return view('listings.edit', 
            ['listings' => $listing
        ]);
    }
    public function create(){
        return view('listings.create');
    }
    
    public function store(Request $request){
        $validateData = $request->validate([
            'title' => 'required',
            'company'=> ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email'=> 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $validateData['logo'] = $request->file('logo')->store('logos','public');
        }

        Listing::create($validateData);

        return redirect('/')->with('success', 'list created succesfully');
    }


    //show edit
}
