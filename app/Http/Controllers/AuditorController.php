<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'candidate_no' => 'required|integer|min:1',
            'partylist_name' => 'required|string|max:255',
        ]);

        $auditor = new Auditor();
        $auditor->name = $request->name;
        $auditor->candidate_no = $request->candidate_no;
        $auditor->partylist_name = $request->partylist_name;
        $auditor->votes = 0;
        $auditor->save();

        return redirect()->route('auditors.create');
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
    public function update(Request $request, Auditor $auditor)
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
