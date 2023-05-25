<?php

namespace App\Http\Controllers;

use App\Models\ATugas;
use App\Models\User;
use Illuminate\Http\Request;

class ATugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = ATugas::all();
        return view('tugas.anggota.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::all();
        return view('tugas.anggota.create', compact('user'));
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
    public function show(ATugas $aTugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ATugas $aTugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ATugas $aTugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ATugas $aTugas)
    {
        //
    }
}
