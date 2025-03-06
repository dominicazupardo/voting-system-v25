<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\PeaceOfficer;

class PeaceOfficerController extends Controller
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
        return view('candidates.peace_officer.create', [
            'peace_officers' => PeaceOfficer::all()
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
    
        PeaceOfficer::create($validatedData);
    
        return redirect()->route('peace_officers.create')->with('success', 'Peace Officer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeaceOfficer $peaceOfficer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeaceOfficer $peaceOfficer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, PeaceOfficer $peaceOfficer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeaceOfficer $peaceOfficer)
    {
        //
    }
}
