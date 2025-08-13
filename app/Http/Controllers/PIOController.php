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

        // Ensure type is set from the form
        $validatedData['type'] = $request->input('type');

        PIO::create($validatedData);

        return redirect()->route('pios.create')->with('success', 'P.I.O. candidate created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PIO $pio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PIO $pio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CandidateRequest $request, PIO $pio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PIO $pio)
    {
        $pio->delete();

        return redirect()->route('pios.create')->with('success', 'Candidate for president Has been deleted!');
    }
}
