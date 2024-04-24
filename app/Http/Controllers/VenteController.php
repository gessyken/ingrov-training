<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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
            'paye' => 'required|numeric',
            'produit_id' => 'required|string|max:36',
        ]);
        $produit = Produit::find($validated['produit_id']);
        $facture = (int) $validated['quantite'] * (int) $produit->prix;
        $validated['id'] = Str::uuid()->toString();
        $validated['user_id'] = auth()->id();
        $validated['montant'] = $facture;

        if ($facture == (int) $validated['paye'])
        {
            $validated['status'] = 'paye';

            Vente::create($validated);

            return redirect()->back()->with('success', 'Produit has been selled successfully');
        }
        elseif ($facture < (int) $validated['paye'])
        {
            $validated['status'] = 'reste';

            $qrCode = QrCode::size(300)->generate("Montant a rembourser " . $validated['paye'] - $facture);

            $filename = 'public/qrcodes/' . auth()->user()->name . '/' . date('d-m-Y') . '/' . $validated['nom_client'] . '-' . $validated['id'] . '.jpg';

            Storage::put($filename, $qrCode);

            $qrCodeF = Storage::url($filename);

            Vente::create($validated);

            return redirect()->back()->with('qrcode', $qrCodeF);
        }
        elseif ($facture > (int) $validated['paye'])
        {
            return redirect()->back()->with('success', 'Le montant encaisse doit etre superieur ou egale a ' . $facture);
        }

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
