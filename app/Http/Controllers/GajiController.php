<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Gaji::all();
        $title = 'Apakah Anda Yakin Ingin Menghapus Data?';
        $text = 'Data yang akan dihapus tidak dapat di kembalikan lagi';
        confirmDelete($title,$text);
        return view('gaji.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all()->where('id','!==',Auth::user()->id);
        return view('gaji.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'unique:gaji',
            'pokok' => 'required',
        ]);
        $form = [
            'user_id' => $request->user_id,
            'pokok' => $request->pokok,
            'tunjangan' => $request->tunjangan,
            'bonus' => $request->bonus,
            'lembur' => $request->lembur,
        ];
        Gaji::create($form);
        Alert::toast('Data Berhasil Di Simpan','success');
        return redirect('/gaji');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($gaji)
    {
        //
        $id = Crypt::decrypt($gaji);
        $users = User::all()->where('id','!=',Auth::user()->id);
        $data = Gaji::findOrFail($id);
        return view('gaji.edit', compact(['data','users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $gaji)
    {
        //

        // dd($request);
        $id = Crypt::decrypt($gaji);
        $data = Gaji::findOrFail($id);

        // $request->validate([
        //     'user_id' => 'unique:gaji',
        //     'pokok' => 'required',
        // ]);
        $form = [
            'pokok' => $request->pokok,
            'tunjangan' => $request->tunjangan,
            'bonus' => $request->bonus,
            'lembur' => $request->lembur
        ];
        // dd($form);
        $data->update($form);
        Alert::toast('Data Berhasil Di Ubah', 'success');
        return redirect('/gaji');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $gaji)
    {
        //
        $id = Crypt::decrypt($gaji);
        $data = Gaji::findOrFail($id);

        $data->delete();
        // dd($data);
        return redirect('/gaji');
    }
}
