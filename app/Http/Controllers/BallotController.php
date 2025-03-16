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
    User,
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

        $president_data = "";
        $vice_president_data = "";

        $ballot->president = $request->president;
        $president = President::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->president])->get();
        foreach ($president as $president_data) { 
            $president_data->votes = $president_data->votes + 1; 
            $president_data->save();
        }
            
        $ballot->vice_president = $request->vice_president;
        $vice_president = VicePresident::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->vice_president])->get();
        foreach ($vice_president as $vice_president_data) {
             $vice_president_data->votes = $vice_president_data->votes + 1; 
             $vice_president_data->save();
        }

        $ballot->secretary = $request->secretary;
        $secretary = Secretary::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->prsecretaryesident])->get();
        foreach ($secretary as $secretary_data) {
            $secretary_data->votes = $secretary_data->votes + 1;
            $secretary_data->save();
        }

        $ballot->treasurer = $request->treasurer;
        $treasurer = Treasurer::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->treasurer])->get();
        foreach ($treasurer as $treasurer_data) {
            $treasurer_data->votes = $treasurer_data->votes + 1;
            $treasurer_data->save();
        }

        $ballot->auditor = $request->auditor;
        $auditor = Auditor::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->auditor])->get();
        foreach ($auditor as $auditor_data) {
            $auditor_data->votes = $auditor_data->votes + 1;
            $auditor_data->save();
        }

        $ballot->pio = $request->pio;
        $pio = PIO::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->pio])->get();
        foreach ($pio as $pio_data) {
            $pio_data->votes = $pio_data->votes + 1;
            $pio_data->save();
        }

        $ballot->peace_officer_1 = $request->peace_officer_1;
        $peace_officer_1 = PeaceOfficer::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->peace_officer_1])->get();
        foreach ($peace_officer_1 as $peace_officer_data_1) {
            $peace_officer_data_1->votes = $peace_officer_data_1->votes + 1;
            $peace_officer_data_1->save();
        }

        $ballot->peace_officer_2 = $request->peace_officer_2;
        $peace_officer_2 = PeaceOfficer::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->peace_officer_2])->get();
        foreach ($peace_officer_2 as $peace_officer_data_2) {
            $peace_officer_data_2->votes = $peace_officer_data_2->votes + 1;
            $peace_officer_data_2->save();
        }

        $ballot->business_manager_1 = $request->business_manager_1;
        $business_manager_1 = BusinessManager::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->business_manager_1])->get();
        foreach ($business_manager_1 as $business_manager_data_1) {
            $business_manager_data_1->votes = $business_manager_data_1->votes + 1;
            $business_manager_data_1->save();
        }

        $ballot->business_manager_2  = $request->business_manager_2;
        $business_manager_2 = BusinessManager::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->business_manager_2])->get();
        foreach ($business_manager_2 as $business_manager_data_2) {
            $business_manager_data_2->votes = $business_manager_data_2->votes + 1;
            $business_manager_data_2->save();
        }

        $ballot->user_id = Auth::user()->id;
        $ballot->save();
        Auth::user()->has_voted = true;
        Auth::user()->save();

        return redirect()->route('ballots.results');
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

    public function results()
    {
        return view('results', [
            'presidents' => President::orderBy('votes', 'desc')->get(),
            'vice_presidents' => VicePresident::orderBy('votes', 'desc')->get(),
            'secretaries' => Secretary::orderBy('votes', 'desc')->get(),
            'treasurers' => Treasurer::orderBy('votes', 'desc')->get(),
            'pios' => PIO::orderBy('votes', 'desc')->get(),
            'business_managers' => BusinessManager::orderBy('votes', 'desc')->get(),
            'auditors' => Auditor::orderBy('votes', 'desc')->get(),
            'peace_officers' => PeaceOfficer::orderBy('votes', 'desc')->get(),
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
    }

    /**
     * Display the specified resource.
     */

    public function show(Request $request)
    {
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
