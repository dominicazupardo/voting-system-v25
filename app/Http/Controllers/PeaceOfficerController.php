<?php

namespace App\Http\Controllers;

use App\Models\PeaceOfficer;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'candidate_no' => 'required|integer|min:1',
                'partylist_name' => 'required|string|max:255',
            ]);

            $peace_officer = new PeaceOfficer();
            $peace_officer->name = $request->name;
            $peace_officer->candidate_no = $request->candidate_no;
            $peace_officer->partylist_name = $request->partylist_name;
            $peace_officer->votes = 0;
            $peace_officer->save();

            return redirect()->route('peace_officers.create');
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
    public function update(Request $request, PeaceOfficer $peaceOfficer)
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
