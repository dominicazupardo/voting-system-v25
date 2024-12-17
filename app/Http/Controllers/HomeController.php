<?php

namespace App\Http\Controllers;

use App\Models\Auditor;
use App\Models\BusinessManager;
use App\Models\PIO;
use Illuminate\Http\Request;
use App\Models\President;
use App\Models\Secretary;
use App\Models\Treasurer;
use App\Models\VicePresident;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function dashboard()
    {
        return view('dashboard', [
            'presidents' => President::all(),
            'vice_presidents' => VicePresident::all(),
            'secretaries' => Secretary::all(),
            'treasurers' => Treasurer::all(),
            'pios' => PIO::all(),
            'business_managers' => BusinessManager::all(),
            'auditors' => Auditor::all(),
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
