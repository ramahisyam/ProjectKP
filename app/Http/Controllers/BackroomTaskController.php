<?php

namespace App\Http\Controllers;

use App\Models\Backroom;
use App\Models\BackroomStatus;
use Illuminate\Http\Request;
use App\Models\CustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class BackroomTaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // dd($user->getRoleNames());
        $backroom = Backroom::where('name', $user->getRoleNames()[0])->first();
        $customers = CustomerRequest::sortable()->filter(request(['search']))
        ->with(['statuses' => function ($query) use ($backroom){
            $query->where('backroom_id', $backroom->id);
        }])
        ->whereHas('statuses', function($query) use ($backroom){
            $query->where('backroom_id', $backroom->id);
        })
        ->latest()
        ->paginate(10);
        // dd($customers->toArray());
        return view('backroom-task.dashboard', compact('customers', 'user'));
    }

    public function edit(BackroomStatus $status)
    {
        return view('backroom-task.edit', compact('status'));
    }

    public function update(Request $request, BackroomStatus $status)
    {
        $status = BackroomStatus::findOrFail($status->id);
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('image') == "") {
            $status->update([
                'name' => $request->name,
                'information' => $request->information,
            ]);
        } else {
            Storage::disk('local')->delete('public/backroomStatuses/'.$status->image);

            $image = $request->file('image');
            $image->storeAs('public/backroomStatuses', $image->hashName());

            $status->update([
                'image'     => $image->hashName(),
                'name' => $request->name,
                'information' => $request->information,
            ]);
        }

        if ($status) {
            return redirect()->route('backroomtask.index')->with(['success' => 'Data Berhasil Disimpan']);
        }else {
            return redirect()->route('backroomtask.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    
    
}
