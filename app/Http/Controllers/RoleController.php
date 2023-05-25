<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    // Buat function untuk menampilkan data user dan juga role
    public function index()
    {
        # Buat query kode untuk menampilkan data user dengan relathionsip role
        $data = User::all();
        return view('role.index', compact('data'));
    }
    public function edit($id)
    {
        # Buat query kode untuk menampilkan data user sesuai data id di table Users
        $id = Crypt::decrypt($id);
        $data = User::findOrFail($id);
        $role = Role::all();
        // dd($role);
        return view('role.edit', compact(['data','role']));
    }
    public function update(Request $request,$id)
    {
        # Buat query kode untuk request untuk update
        $id = Crypt::decrypt($id);
        $data = User::findOrFail($id);

        $form = [
            'role_id' => $request->role
        ];
        $data->update($form);
        // dd($form);
        return redirect('/users');
    }
    public function delete($id)
    {
        # Buat query kode untuk mencari data dan hapus data
        $id = Crypt::decrypt($id);
        $data = User::findOrFail($id);

        $data->delete();
        return redirect('/users');
        // dd($id);
    }
}
