<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\VicePresident;

class VicePresidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidates.vice_president.create', [
            'vice_presidents' => VicePresident::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateRequest $request)
    {
        $validatedData = $request->validated();
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = basename($imagePath);
        } else {
            return back()->withErrors(['image' => 'Image upload failed.']);
        }
    
        $validatedData['votes'] = 0;
    
        VicePresident::create($validatedData);
    
        return redirect()->route('vice_presidents.create')->with('success', 'Vice President candidate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VicePresident $vicePresident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VicePresident $vicePresident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, VicePresident $vicePresident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VicePresident $vicePresident)
    {
        $vicePresident->delete();

        return redirect()->route('vice_presidents.create')->with('success', 'Candidate for president Has been deleted!');
    }
}
