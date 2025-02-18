<?php

namespace App\Http\Controllers;

use App\Models\President;
use Illuminate\Http\Request;

class PresidentController extends Controller
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
        return view('candidates.president.create', [
            'presidents' => President::all()
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
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $path = $request->file('image')->store('images', 'public');

            $president = new President();
            $president->name = $request->name;
            $president->candidate_no = $request->candidate_no;
            $president->partylist_name = $request->partylist_name;
            $president->image = basename($path);
            $president->votes = 0;
            $president->save();

            return redirect()->route('presidents.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(President $president)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(President $president)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, President $president)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(President $president)
    {
        //
    }
}
