<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\PIO;

class PIOController extends Controller
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
        return view('candidates.pio.create', [
            'pios' => PIO::all()
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
    
        PIO::create($validatedData);
    
        return redirect()->route('pios.create')->with('success', 'P.I.O. created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PIO $pIO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PIO $pIO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, PIO $pIO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PIO $pIO)
    {
        //
    }
}
