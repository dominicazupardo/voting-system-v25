<?php

namespace App\Http\Controllers;

use App\Models\Secretary;
use Illuminate\Http\Request;

class SecretaryController extends Controller
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
        return view('candidates.secretary.create', [
            'secretaries' => Secretary::all()
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

        $secretary = new Secretary();
        $secretary->name = $request->name;
        $secretary->candidate_no = $request->candidate_no;
        $secretary->partylist_name = $request->partylist_name;
        $secretary->image = basename($path);
        $secretary->votes = 0;
        $secretary->save();

        return redirect()->route('secretaries.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Secretary $secretary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secretary $secretary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secretary $secretary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secretary $secretary)
    {
        //
    }
}
