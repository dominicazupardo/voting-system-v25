<?php

namespace App\Http\Controllers;

use App\Models\{
    Ballot,
    President,
    VicePresident,
    Secretary,
    Treasurer,
    PIO,
    BusinessManager,
    Auditor,
};
use Illuminate\Http\Request;

class BallotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ballot', [
            'presidents' => President::all(),
            'vice_presidents' => VicePresident::all(),
            'secretaries' => Secretary::all(),
            'treasurers' => Treasurer::all(),
            'pios' => PIO::all(),
            'business_managers' => BusinessManager::all(),
            'auditors' => Auditor::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ballot $ballot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ballot $ballot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ballot $ballot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ballot $ballot)
    {
        //
    }
}
