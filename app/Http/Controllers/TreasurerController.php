<?php

namespace App\Http\Controllers;

use App\Models\Treasurer;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'candidate_no' => 'required|integer|min:1',
            'partylist_name' => 'required|string|max:255',
        ]);

        $treasurer = new Treasurer();
        $treasurer->name = $request->name;
        $treasurer->candidate_no = $request->candidate_no;
        $treasurer->partylist_name = $request->partylist_name;
        $treasurer->votes = 0;
        $treasurer->save();

        return redirect()->route('treasurers.create');
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
    public function update(Request $request, Treasurer $treasurer)
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
