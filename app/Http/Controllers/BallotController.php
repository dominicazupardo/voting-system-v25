<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\{
    Ballot,
    President,
    VicePresident,
    Secretary,
    Treasurer,
    PIO,
    BusinessManager,
    Auditor,
    PeaceOfficer,
};
use Illuminate\Http\Request;

class BallotController extends Controller
{
    public function preview(Request $request)
    {
        return view('ballots.preview', [
            'ballots' => $request
        ]);
    }

    public function cast(Request $request)
    {
        $ballot = new Ballot();

        $ballot->president = $request->president;
        $president = President::where('name', '=', $request->president)->get();
        $president->votes++;
        $ballot->vice_president = $request->vice_president;
        $vice_president = VicePresident::where('name', '=', $request->vice_president)->get();
        $vice_president->votes++;
        $ballot->secretary = $request->secretary;
        $secretary = Secretary::where('name', '=', $request->secretary)->get();
        $secretary->votes++;
        $ballot->treasurer = $request->treasurer;
        $treasurer = Treasurer::where('name', '=', $request->treasurer)->get();
        $treasurer->votes++;
        $ballot->auditor = $request->auditor;
        $auditor = Auditor::where('name', '=', $request->auditor)->get();
        $auditor->votes++;
        $ballot->pio = $request->pio;
        $pio = PIO::where('name', '=', $request->pio)->get();
        $pio->votes++;
        $ballot->peace_officer = $request->peace_officer_1;
        $peace_officer = PeaceOfficer::where('name', '=', $request->peace_officer_1)->get();
        $peace_officer->votes++;
        $ballot->peace_officer = $request->peace_officer_2;
        $peace_officer = PeaceOfficer::where('name', '=', $request->peace_officer_2)->get();
        $peace_officer->votes++;
        $ballot->business_manager = $request->business_manager_1;
        $business_manager = BusinessManager::where('name', '=', $request->business_manager_1)->get();
        $business_manager->votes++;
        $ballot->business_manager = $request->business_manager_2;
        $business_manager = BusinessManager::where('name', '=', $request->business_manager_2)->get();
        $business_manager->votes++;
        $ballot->user_id = Auth::user()->id;

        $ballot->save();

        return redirect()->route('dashboard');
    }

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
            'peace_officers' => PeaceOfficer::all(),
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
        dd($request);
    }

    /**
     * Display the specified resource.
     */

    public function show(Request $request)
    {
        dd($request);
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
