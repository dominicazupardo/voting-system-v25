<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Http\Requests\CandidateRequest;

class AuditorController extends Controller
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
        return view('candidates.auditor.create', [
            'auditors' => Auditor::all()
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
    
        Auditor::create($validatedData);
    
        return redirect()->route('auditors.create')->with('success', 'Auditor created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Auditor $auditor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auditor $auditor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, Auditor $auditor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auditor $auditor)
    {
        //
    }
}
