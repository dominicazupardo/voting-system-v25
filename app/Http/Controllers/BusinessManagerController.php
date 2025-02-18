<?php

namespace App\Http\Controllers;

use App\Models\BusinessManager;
use Illuminate\Http\Request;

class BusinessManagerController extends Controller
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
        return view('candidates.business_manager.create', [
            'business_managers' => BusinessManager::all()
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

        $business_manager = new BusinessManager();
        $business_manager->name = $request->name;
        $business_manager->candidate_no = $request->candidate_no;
        $business_manager->partylist_name = $request->partylist_name;
        $business_manager->image = basename($path);
        $business_manager->votes = 0;
        $business_manager->save();

        return redirect()->route('business_managers.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessManager $businessManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessManager $businessManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessManager $businessManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessManager $businessManager)
    {
        //
    }
}
