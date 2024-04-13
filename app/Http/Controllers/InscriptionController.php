<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $inscriptions = Inscription::all();
        return view('inscriptions.index', compact('inscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        return view('inscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

        ]);

        dd($validatedData);

        return redirect()->route('inscriptions.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscription $inscription)
    {
        return view('inscriptions.show', compact('inscription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        return view('inscriptions.edit', compact('inscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscription $inscription)
    {
        $validatedData = $request->validate([

        ]);
        $inscription->update($validatedData);
        return redirect()->route('inscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
        $inscription->delete();
        return redirect()->route('inscriptions.index');
    }

}
