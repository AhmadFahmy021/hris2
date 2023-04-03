<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Route ke halaman profile
        $userId = Auth::user()->id;
        $data = Profile::all()->where('user_id', $userId)->first();
        // dd($data->pos);
            return view('profile.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Route create
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Route 
        $validasi = $request->validate([
            'hp' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'kota' => 'required',
            'kec' => 'required',
            'pos' => 'required',
            'alamat' => 'required',
        ]);
        $validasi['user_id'] = Auth::user()->id;
        // dd($validasi);
        Profile::create($validasi);

        return redirect('/profile');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($profile)
    {
        //Route Tampilan
        $id = Crypt::decrypt($profile);
        $prof = Profile::findOrFail($id);
        // dd($prof);
        return view('profile.edit', compact(['prof']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $profile)
    {
        //
        $id = Crypt::decrypt($profile);
        // dd($id);
        $prof = Profile::findOrFail($id);
        $form = $request->validate([
            'hp' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'kota' => 'required',
            'kec' => 'required',
            'pos' => 'required',
            'alamat' => 'required',
        ]);

        $prof->update($form);
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
