<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Treasurer;

class TreasurerController extends Controller
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
        return view('candidates.treasurer.create', [
            'treasurers' => Treasurer::all()
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
    
        Treasurer::create($validatedData);
    
        return redirect()->route('treasurers.create')->with('success', 'Treasurer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Treasurer $treasurer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Treasurer $treasurer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, Treasurer $treasurer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treasurer $treasurer)
    {
        //
    }
}
