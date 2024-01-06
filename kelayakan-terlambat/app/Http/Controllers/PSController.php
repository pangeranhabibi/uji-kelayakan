<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PSController extends Controller
{
    public function index()
    {
        return view('ps.index');  
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
    public function show(PS $pS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PS $pS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PS $pS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PS $pS)
    {
        //
    }
}
