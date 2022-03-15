<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $users = User::latest()
        ->where('name', '!=', 'Admin')
        ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        User::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('users.index')
            ->with('success', 'User Berhasil Ditambahkan');
    }

    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user
        $user = User::find($id);
        return view('users.detail', compact('user'));
    }

    public function edit($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan id user untuk diedit
        $user = User::find($id);
        $roles = Role::where('name', '!=', 'superAdmin')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        //fungsi eloquent untuk mengupdate data inputan kita
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber,
        ]);

        $user->syncRoles($request['role']);
        if ($user->hasRole('AM')) {
            $user->syncPermissions('accountManager');
        } else {
            $user->syncPermissions('backroom');
        }

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('user.index')
            ->with(['success' => 'User Berhasil Diupdate']);
    }

    public function destroy($id)
    {
        //fungsi eloquent untuk menghapus data
        User::find($id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Dihapus');
    }
}