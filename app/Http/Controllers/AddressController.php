<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Addresses/Index', [
            'addresses' => Address::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Addresses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'complement' => 'nullable|string'
        ]);

        Address::create($validated);

        return redirect()->route('addresses.index')
            ->with('success', 'Adresse créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return Inertia::render('Addresses/Edit', [
            'address' => $address
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $validated = $request->validate([
            'label' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'complement' => 'nullable|string'
        ]);

        $address->update($validated);

        return redirect()->route('addresses.index')
            ->with('success', 'Adresse modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')
            ->with('success', 'Adresse supprimée avec succès !');
    }
}
