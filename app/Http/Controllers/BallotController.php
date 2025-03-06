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

        if ($request->president !== null) 
        {
            dd($request->president_id);
            // $president = President::whereIn('id', $request->president_id)->get();
            // dd($president);
            // $ballot->president = sprintf("%s %s. %s", $president->firstname, substr($president->middlename, 0, 1), $president->lastname);
            // $president->votes = $president->votes + 1; 
            // $president->save();
        }
            
        if ($request->vice_president !== null) 
        {
            $vice_president = VicePresident::find($request->vice_president_id)->first();

            foreach ($vice_president as $vice_president_data) 
            {
                $ballot->vice_president = sprintf("%s %s. %s", $vice_president_data->firstname, substr($vice_president_data->middlename, 0, 1), $vice_president_data->lastname);
                $vice_president_data->votes = $vice_president_data->votes + 1; 
                $vice_president_data->save();
            }
        }

        if ($request->secretary !== null) 
        {
            $secretary = Secretary::find($request->secretary_id)->first();

            foreach ($secretary as $secretary_data) 
            {
                $ballot->secretary = sprintf("%s %s. %s", $secretary_data->firstname, substr($secretary_data->middlename, 0, 1), $secretary_data->lastname);   
                $secretary_data->votes = $secretary_data->votes + 1;
                $secretary_data->save();
            }
        }
        
        if ($request->treasurer !== null)
        {
            $treasurer = Treasurer::find($request->treasurer_id)->first();

            foreach ($treasurer as $treasurer_data) 
            {
                $ballot->treasurer = sprintf("%s %s. %s", $treasurer_data->firstname, substr($treasurer_data->middlename, 0, 1), $treasurer_data->lastname);   
                $treasurer_data->votes = $treasurer_data->votes + 1;
                $treasurer_data->save();
            }
        }

        if ($request->auditor !== null)
        {
            $auditor = Auditor::find($request->auditor_id)->first();

            foreach ($auditor as $auditor_data) 
            {
                $ballot->auditor = sprintf("%s %s. %s", $auditor_data->firstname, substr($auditor_data->middlename, 0, 1), $auditor_data->lastname);   
                $auditor_data->votes = $auditor_data->votes + 1;
                $auditor_data->save();
            }
        }

        if ($request->pio !== null)
        {
            $pio = PIO::find($request->pio_id);

            foreach ($pio as $pio_data) 
            {
                $ballot->pio = sprintf("%s %s. %s", $pio_data->firstname, substr($pio_data->middlename, 0, 1), $pio_data->lastname);   
                $pio_data->votes = $pio_data->votes + 1;
                $pio_data->save();
            }
        } 
        

        if ($request->peace_officer_1 !== null)
        {
            $peace_officer_1 = PeaceOfficer::find($request->peace_officer_1_id)->first();

            foreach ($peace_officer_1 as $peace_officer_data_1) 
            {
                $ballot->peace_officer_1 = sprintf("%s %s. %s", $peace_officer_data_1->firstname, substr($peace_officer_data_1->middlename, 0, 1), $peace_officer_data_1->lastname);   
                $peace_officer_data_1->votes = $peace_officer_data_1->votes + 1;
                $peace_officer_data_1->save();
            }
        }
        
        if ($request->peace_officer_2 !== null)
        {
            $peace_officer_2 = PeaceOfficer::find($request->peace_officer_2_id)->first();

            foreach ($peace_officer_2 as $peace_officer_data_2) 
            {
                $ballot->peace_officer_2 = sprintf("%s %s. %s", $peace_officer_data_2->firstname, substr($peace_officer_data_2->middlename, 0, 1), $peace_officer_data_2->lastname);   
                $peace_officer_data_2->votes = $peace_officer_data_2->votes + 1;
                $peace_officer_data_2->save();
            }
        }

        if ($request->business_manager_1 !== null)
        {
            $business_manager_1 = BusinessManager::find($request->business_manager_1)->first();

            foreach ($business_manager_1 as $business_manager_data_1) 
            {
                $ballot->business_manager_1 = sprintf("%s %s. %s", $business_manager_data_1->firstname, substr($business_manager_data_1->middlename, 0, 1), $business_manager_data_1->lastname);   
                $business_manager_data_1->votes = $business_manager_data_1->votes + 1;
                $business_manager_data_1->save();
            }
        }
        

        if ($request->business_manager_2 !== null)
        {
            $business_manager_2 = BusinessManager::find($request->business_manager_2)->first();

            foreach ($business_manager_2 as $business_manager_data_2) 
            {
                $ballot->business_manager_2 = sprintf("%s %s. %s", $business_manager_data_2->firstname, substr($business_manager_data_2->middlename, 0, 1), $business_manager_data_2->lastname);   
                $business_manager_data_2->votes = $business_manager_data_2->votes + 1;
                $business_manager_data_2->save();
            }
        }

        // $user = User::find(Auth::user()->id);
        // $user->has_voted = true;
        // $user->save();
        
        // $ballot->user_id = Auth::user()->id;
        // $ballot->save();

        // return redirect()->route('ballots.results');
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
