<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Backroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()
        ->with('backrooms')
        ->paginate(10);
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $backrooms = Backroom::where('name', 'NOT LIKE', 'Witel%')->get();
        return view('admin.service.add', compact('backrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
        ]);

        $service = Service::create([
            'name' => $request->name,
        ]);

        foreach ($request->backroom as $backroom => $value) {
            DB::table('backroom_service')->insert([
                'service_id' => $service->id,
                'backroom_id' => $value
            ]);
        }

        if ($service) {
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Service $service)
    {
        $backrooms = Backroom::where('name', 'NOT LIKE', '%Witel%')->get();
        return view('admin.service.edit', compact('service', 'backrooms'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $service->update([
            'name' => $request->name
        ]);

        DB::table('backroom_service')->where('id', $service->backrooms)->update([
            'backroom_id' => $request->backroom
        ]);

        if ($service) {
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function destroy($id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        
        if($services){
            //redirect dengan pesan sukses
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
       }else{
           //redirect dengan pesan error
           return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
       }
   } 
}
