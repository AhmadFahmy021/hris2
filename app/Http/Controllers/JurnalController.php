<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
// use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Console\View\Components\Alert;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Route View
        $data = Jurnal::all()->where('user_id',Auth::user()->id);
        // dd($data);
        // $data = $data->toJson(JSON_PRETTY_PRINT);
        // dd($api);
        $title = "Yakin Data Akan Dihapus?";
        $text = "Data Yang Akan Di Hapus Tidak Dapat Di Kembalikan";
        confirmDelete($title, $text);
        return view('jurnal.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jurnal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validasi = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);
        $validasi['user_id'] = Auth::user()->id;
        Jurnal::create($validasi);
        Alert::toast('Data Berhasil Di Simpan', 'success');
        return redirect('/jurnal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $jurnal)
    {
        //Route
        
        $id = Crypt::decrypt($jurnal);
        $jur = Jurnal::findOrFail($id);

        // dd($jur);

        return view('jurnal.edit', compact('jur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jurnal)
    {
        //
        $id = Crypt::decrypt($jurnal);
        $jur = Jurnal::findOrFail($id);

        $form = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);

        $jur->update($form);
        Alert::toast('Data Berhasil Di Ubah', 'success');
        return redirect('/jurnal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $jurnal)
    {
        //
        $id = Crypt::decrypt($jurnal);
        $jur = Jurnal::findOrFail($id);

        $jur->delete();
        Alert::toast('Data Berhasil Di Hapus', 'success');
        return redirect('/jurnal');
    }
}
