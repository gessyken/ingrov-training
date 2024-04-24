<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VenteController extends Controller
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
        $produits = Produit::orderBy('nom')->get();
        return view('ventes.create', compact('produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_client' => 'required|string|max:50',
            'quantite' => 'required|numeric',
            'produit_id' => 'required|string|max:36',
        ]);

        $validated['id'] = Str::uuid()->toString();
        $validated['user_id'] = auth()->id();

        Vente::create($validated);

        return redirect()->back()->with('success', 'Produit has been selled successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vente $vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vente $vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vente $vente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vente $vente)
    {
        //
    }
}
