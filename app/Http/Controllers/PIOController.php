<?php

namespace App\Http\Controllers;

use App\Models\PIO;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'candidate_no' => 'required|integer|min:1',
            'partylist_name' => 'required|string|max:255',
        ]);

        $pio = new PIO();
        $pio->name = $request->name;
        $pio->candidate_no = $request->candidate_no;
        $pio->partylist_name = $request->partylist_name;
        $pio->votes = 0;
        $pio->save();

        return redirect()->route('pios.create');
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
    public function update(Request $request, PIO $pIO)
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
