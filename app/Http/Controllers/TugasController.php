<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
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
        $data = Tugas::all()->where('user_id', '!=', null);
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
        // dd($id);
        $tugas->delete();
        return redirect('/tugas');
    }

    public function tim(){
        $data = Tugas::all()->where('divisi_id', '!=', null);
        return view('tugas.tim', compact('data'));
    }
    public function tim_create(){
        $data = Divisi::all();
        return view('tugas.create_tim', compact('data'));
    }
    public function tim_store(Request $request){
        // dd($request);
        $request->validate([
            'divisi' => 'required',
            'tugas' => 'required'
        ]);
        $form = [
            'divisi_id' => $request->divisi,
            'tugas' => $request->tugas,
            'selesai' => $request->selesai,
        ];
        Tugas::create($form);
        return redirect('/tugass/tim');
    }
    public function tim_edit($id){
        $id = Crypt::decrypt($id);
        $ed = Tugas::findOrFail($id);
        $data = Divisi::all();
        // dd($ed);
        return view('tugas.edit_tim', compact(['ed','data']));
        
    }
    public function tim_update(Request $request, $id){
        $id = Crypt::decrypt($id);
        $ed = Tugas::findOrFail($id);
        
        $request->validate([
            'divisi' => 'required',
            'tugas' => 'required',
        ]);
        $form = [
            'divisi_id' => $request->divisi,
            'tugas' => $request->tugas,
            'selesai' => $request->selesai,
        ];
        $ed->update($form);
        return redirect('/tugass/tim');
        
    }

    public function tim_destroy($id){
        $id = Crypt::decrypt($id);
        $ed = Tugas::findOrFail($id);
        $ed->delete();
        return redirect('/tugass/tim');
    }
}
