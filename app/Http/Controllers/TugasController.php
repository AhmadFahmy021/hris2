<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Tugas::all();
        // dd($divisi);
        return view('tugas.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::all();
        return view('tugas.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->nama);
        $request->validate([
            'nama' => 'required',
            'tugas' => 'required',
        ]);
        $data = [
            'user_id' => $request->nama,
            'tugas' => $request->tugas,
            'selesai' => $request->selesai,
        ];
        // dd($data);
        Tugas::create($data);
        return redirect('/tugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $id = Crypt::decrypt($id);
        $tugas = Tugas::findOrFail($id);
        $data = User::all();
        // dd($tugas);
        // dd($data);
        return view('tugas.edit',compact('data','tugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tugas)
    {
        
        $id = Crypt::decrypt($tugas);
        $tugas = Tugas::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'tugas' => 'required',
        ]);
        $form = [
            'user_id' => $request->nama,
            'tugas' => $request->tugas,
            'selesai' => $request->selesai
        ];
        $tugas->update($form);
        return redirect('/tugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tugas)
    {
        //
        $id = Crypt::decrypt($tugas);
        $tugas = Tugas::findOrFail($id);

        $tugas->delete();
        return redirect('/tugas');
    }

    public function tim(){
        return view('tugas.tim');
    }
}
