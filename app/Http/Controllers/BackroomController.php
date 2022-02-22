<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use App\Models\BackroomStatus;
use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use Illuminate\Database\Eloquent\Builder;

class BackroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        // dd($user->getRoleNames());
        if ($user->can('backroom')) {
            $backroom = Backroom::where('name', $user->getRoleNames()[0])->first();
            $customers = CustomerRequest::sortable()->filter(request(['search']))
            ->with(['statuses' => function ($query) use ($backroom){
                $query->where('backroom_id', $backroom->id);
            }])
            ->whereHas('statuses', function($query) use ($backroom){
                $query->where('backroom_id', $backroom->id);
            })
            ->paginate(10);
            // dd($customers->toArray());
            return view('backroom.dashboard', compact('customers', 'user'));
        }
    }

    public function edit(BackroomStatus $status)
    {
        return view('backroom.edit', compact('status'));
    }

    public function update(Request $request, BackroomStatus $status)
    {
        $status = BackroomStatus::findOrFail($status->id);
        $status->update([
            'name' => $request->name,
            'information' => $request->information,
        ]);

        if ($status) {
            return redirect()->route('backroom.index')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('backroom.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    
    
}
