<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modul;

class ModulController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $moduls = Modul::with('courses')->get();
        foreach ($moduls as $modul) {
            if ($modul->image) {
                $modul->image_url = asset('backend-uploads/' . $modul->image);
            }
        } // Mengambil data kursus beserta instruktur
        return view('user.modul', compact('moduls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    //     $moduls = Modul::all();
    //     return view('modul.create', compact('moduls'));
    // }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Simpan data ke database
        Modul::create($validated);
    
        return redirect('/admin/moduls')->with('success', 'Modul added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        //
        return view('modul.edit', compact('modul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
        $modul = Modul::findOrFail($id);
        $modul->update($request->all());
        return redirect('/admin/moduls')->with('success', 'Moduls updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
        $modul = Modul::findOrFail($id);
        $modul->delete();
        return redirect('/admin/moduls')->with('success', 'Modul deleted successfully.');
    }
}
