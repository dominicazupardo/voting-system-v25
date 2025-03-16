<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\President;

class PresidentController extends Controller
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
        return view('candidates.president.create', [
            'presidents' => President::all()
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
    
        President::create($validatedData);
    
        return redirect()->route('presidents.create')->with('success', 'President candidate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(President $president)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(President $president)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, President $president)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(President $president)
    {
        $president->delete();

        return redirect()->route('presidents.create')->with('success', 'Candidate for president Has been deleted!');
    }
}
