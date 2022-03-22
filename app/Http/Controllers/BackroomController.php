<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class BackroomController extends Controller
{
    public function index()
    {
        $backrooms = Backroom::latest()->paginate(10);
        return view('admin.backroom.index', compact('backrooms'));
    }
    
    public function create()
    {
        return view('admin.backroom.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $backroom = Backroom::create([
            'name' => $request->name,
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        if ($backroom) {
            return redirect()->route('backroom.index')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('backroom.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Backroom $backroom)
    {
        return view('admin.backroom.edit', compact('backroom'));
    }

    public function update(Request $request, Backroom $backroom)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $backroom->update([
            'name' => $request->name
        ]);

        if ($backroom) {
            return redirect()->route('backroom.index')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('backroom.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function destroy($id)
    {
        $backrooms = Backroom::findOrFail($id);
        $backrooms->delete();
        
        if($backrooms){
            //redirect dengan pesan sukses
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
       }else{
           //redirect dengan pesan error
           return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
       }
   }
}
