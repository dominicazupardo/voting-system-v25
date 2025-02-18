<?php

namespace App\Http\Controllers;

use App\Models\VicePresident;
use Illuminate\Http\Request;

class VicePresidentController extends Controller
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
        return view('candidates.vice_president.create', [
            'vice_presidents' => VicePresident::all()
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

        $vice_president = new VicePresident();
        $vice_president->name = $request->name;
        $vice_president->candidate_no = $request->candidate_no;
        $vice_president->partylist_name = $request->partylist_name;
        $vice_president->image = basename($path);;
        $vice_president->votes = 0;
        $vice_president->save();

        return redirect()->route('vice_presidents.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(VicePresident $vicePresident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VicePresident $vicePresident)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VicePresident $vicePresident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VicePresident $vicePresident)
    {
        //
    }
}
