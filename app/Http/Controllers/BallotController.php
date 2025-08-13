<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        // Validate input
        $validated = $request->validate([
            'president' => 'nullable|string',
            'vice_president' => 'nullable|string',
            'secretary' => 'nullable|string',
            'treasurer' => 'nullable|string',
            'auditor' => 'nullable|string',
            'pio_internal' => 'nullable|string',
            'pio_external' => 'nullable|string',
            'business_manager_internal' => 'nullable|string',
            'business_manager_external' => 'nullable|string',
            'peace_officer_internal' => 'nullable|string',
            'peace_officer_external' => 'nullable|string',
            'rep_1st_year' => 'nullable|string',
            'rep_2nd_year' => 'nullable|string',
            'rep_3rd_year' => 'nullable|string',
            'rep_4th_year' => 'nullable|string',
        ]);

    DB::transaction(function () use ($request) {
            $ballot = new Ballot();
            // Assign ballot fields
            $ballot->president = $request->president;
            $ballot->vice_president = $request->vice_president;
            $ballot->secretary = $request->secretary;
            $ballot->treasurer = $request->treasurer;
            $ballot->auditor = $request->auditor;
            $ballot->pio_internal = $request->pio_internal;
            $ballot->pio_external = $request->pio_external;
            $ballot->business_manager_internal = $request->business_manager_internal;
            $ballot->business_manager_external = $request->business_manager_external;
            $ballot->peace_officer_internal = $request->peace_officer_internal;
            $ballot->peace_officer_external = $request->peace_officer_external;
            $ballot->rep_1st_year = $request->rep_1st_year;
            $ballot->rep_2nd_year = $request->rep_2nd_year;
            $ballot->rep_3rd_year = $request->rep_3rd_year;
            $ballot->rep_4th_year = $request->rep_4th_year;
            $ballot->user_id = Auth::user()->id;
            $ballot->save();

            // Increment votes for each selected candidate (null-safe)
            $positions = [
                'president' => President::class,
                'vice_president' => VicePresident::class,
                'secretary' => Secretary::class,
                'treasurer' => Treasurer::class,
                'auditor' => Auditor::class,
            ];
            foreach ($positions as $field => $model) {
                if ($request->$field) {
                    $candidates = $model::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ?", [$request->$field])->get();
                    foreach ($candidates as $candidate) {
                        $candidate->votes = $candidate->votes + 1;
                        $candidate->save();
                    }
                }
            }

            // Internal/External positions
            $internalExternal = [
                'pio_internal' => [PIO::class, 'internal'],
                'pio_external' => [PIO::class, 'external'],
                'business_manager_internal' => [BusinessManager::class, 'internal'],
                'business_manager_external' => [BusinessManager::class, 'external'],
                'peace_officer_internal' => [PeaceOfficer::class, 'internal'],
                'peace_officer_external' => [PeaceOfficer::class, 'external'],
            ];
            foreach ($internalExternal as $field => [$model, $type]) {
                if ($request->$field) {
                    $candidates = $model::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ? AND type = ?", [$request->$field, $type])->get();
                    foreach ($candidates as $candidate) {
                        $candidate->votes = $candidate->votes + 1;
                        $candidate->save();
                    }
                }
            }

            // 1st-4th Year Representatives
            foreach ([
                'rep_1st_year' => '1st Year',
                'rep_2nd_year' => '2nd Year',
                'rep_3rd_year' => '3rd Year',
                'rep_4th_year' => '4th Year',
            ] as $field => $year) {
                if ($request->$field) {
                    $rep = \App\Models\Candidate::whereRaw("CONCAT(firstname, ' ', LEFT(middlename, 1), '. ', lastname) = ? AND year = ?", [$request->$field, $year])->first();
                    if ($rep) {
                        $rep->votes = ($rep->votes ?? 0) + 1;
                        $rep->save();
                    }
                }
            }

            // Mark user as voted
            $user = User::find(Auth::id());
            $user->has_voted = true;
            $user->save();
        });

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
            'pios_internal' => PIO::where('type', 'internal')->get(),
            'pios_external' => PIO::where('type', 'external')->get(),
            'business_managers_internal' => BusinessManager::where('type', 'internal')->get(),
            'business_managers_external' => BusinessManager::where('type', 'external')->get(),
            'auditors' => Auditor::all(),
            'peace_officers_internal' => PeaceOfficer::where('type', 'internal')->get(),
            'peace_officers_external' => PeaceOfficer::where('type', 'external')->get(),
            'rep_1st_year' => \App\Models\Candidate::where('year', '1st Year')->where('position', 'representative')->get(),
            'rep_2nd_year' => \App\Models\Candidate::where('year', '2nd Year')->where('position', 'representative')->get(),
            'rep_3rd_year' => \App\Models\Candidate::where('year', '3rd Year')->where('position', 'representative')->get(),
            'rep_4th_year' => \App\Models\Candidate::where('year', '4th Year')->where('position', 'representative')->get(),
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
            'rep_1st_year' => \App\Models\Candidate::where('year', '1st Year')->where('position', 'representative')->orderBy('votes', 'desc')->get(),
            'rep_2nd_year' => \App\Models\Candidate::where('year', '2nd Year')->where('position', 'representative')->orderBy('votes', 'desc')->get(),
            'rep_3rd_year' => \App\Models\Candidate::where('year', '3rd Year')->where('position', 'representative')->orderBy('votes', 'desc')->get(),
            'rep_4th_year' => \App\Models\Candidate::where('year', '4th Year')->where('position', 'representative')->orderBy('votes', 'desc')->get(),
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
