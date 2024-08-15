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
            'listing' => $listing
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
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing){
        $validateData = $request->validate([
            'title' => 'required',
            'company'=> 'required',
            'location' => 'required',
            'email'=> 'required|email',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')){
            $validateData['logo'] = $request->file('logo')->store('logos','public');
        }

        
        $listing->update($validateData);

        return back()->with('success', 'list created succesfully');
    }


    public function destroy(Listing $listing){
        $listing->delete();
        return redirect('/')->with( 'success', 'list deleted succesfuly');
    }
}
