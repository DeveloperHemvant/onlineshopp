<?php

namespace App\Http\Controllers;

use App\Models\vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendor.vendor_register');
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
    public function show(vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vendor $vendor)
    {
        //
    }
}
