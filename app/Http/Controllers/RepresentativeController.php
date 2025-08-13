<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;


class RepresentativeController extends Controller
{

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        if ($candidate->position === 'representative') {
            $candidate->delete();
            return redirect()->back()->with('success', 'Representative candidate deleted successfully!');
        }
        return redirect()->back()->withErrors(['error' => 'Candidate not found or not a representative.']);
    }

    public function create(Request $request)
    {
        $year = $request->query('year', '1st Year');
        $representatives = Candidate::where('year', $year)->where('position', 'representative')->get();
        return view('candidates.representative.create', compact('year', 'representatives'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'partylist_name' => 'required|string|max:255',
            'year' => 'required|in:1st Year,2nd Year,3rd Year,4th Year',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $candidate = new Candidate($validated);
        $candidate->position = 'representative';
        // Set candidate_no to be one more than the current count for this year
        $candidate->candidate_no = Candidate::where('year', $validated['year'])
            ->where('position', 'representative')->count() + 1;
        if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                // Remove 'images/' prefix if present
                $candidate->image = str_replace('images/', '', $imagePath);
        }
        $candidate->save();

        return redirect()->route('candidates.index')->with('success', 'Representative candidate registered successfully!');
    }
}
