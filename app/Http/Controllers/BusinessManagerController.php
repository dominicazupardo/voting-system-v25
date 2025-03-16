<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\BusinessManager;

class BusinessManagerController extends Controller
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
        return view('candidates.business_manager.create', [
            'business_managers' => BusinessManager::all()
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
    
        BusinessManager::create($validatedData);
    
        return redirect()->route('business_managers.create')->with('success', 'Business Manager candidate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessManager $businessManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessManager $businessManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, BusinessManager $businessManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessManager $businessManager)
    {
        $businessManager->delete();

        return redirect()->route('business_managers.create')->with('success', 'Candidate for president Has been deleted!');
    }
}
