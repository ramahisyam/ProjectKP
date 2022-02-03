<?php

namespace App\Http\Controllers;

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
            $customers = CustomerRequest::sortable()->filter(request(['search']))->with(['service.backrooms' => function ($query) use ($user){
                $query->whereIn('name', $user->getRoleNames());
            }])->whereHas('service.backrooms', function($query) use ($user){
                $query->whereIn('name', $user->getRoleNames());
            })->paginate(10);
            // dd($customers);
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
