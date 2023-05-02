<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Divisi::all();
        
        $profile = Profile::all()->where('divisi_id','=',$data);
        dd($data);
        return view('divisi.index', compact('data','profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('divisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $valid = $request->validate([
            'divisi' => 'required'
        ]);
        Divisi::create($valid);
        return redirect('/divisi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Divisi $divisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $divisi)
    {
        //
        $ed = Crypt::decrypt($divisi);
        $div = Divisi::findOrFail($ed);
        return view('divisi.edit', compact('div'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $divisi)
    {
        //
        $ed = Crypt::decrypt($divisi);
        $div = Divisi::findOrFail($ed);

        $valid = $request->validate(['divisi' => 'required']);
        $div->update($valid);
        return redirect('/divisi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $divisi)
    {
        //
        $del = Crypt::decrypt($divisi);
        $div = Divisi::findOrFail($del);
        // dd($del);
        $div->delete();
        return redirect('/divisi');
    }
}
